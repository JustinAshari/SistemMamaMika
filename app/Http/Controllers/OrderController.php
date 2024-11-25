<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('PesanView', [
            'products' => $products,
        ]);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_pembeli' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'product_id' => 'required|exists:products,id',
        'jumlah' => 'required|integer|min:1',
        'payment' => 'required|in:COD,QRIS',
    ]);

    $product = Product::findOrFail($validated['product_id']);
    $total = $product->harga * $validated['jumlah'];

    try {
        Order::create([
            'nama_pembeli' => $validated['nama_pembeli'],
            'product_id' => $validated['product_id'],
            'alamat' => $validated['alamat'],
            'jumlah' => $validated['jumlah'],
            'total' => $total,
            'payment' => $validated['payment'],
            'status' => 'pending',  // Nilai default untuk status
        ]);

        return redirect()->route('/')
            ->with('success', 'Pesanan Anda berhasil dikirim!');
    } catch (\Exception $e) {
        return redirect()->back()
            ->withErrors(['error' => 'Terjadi kesalahan saat memproses pesanan.'])
            ->withInput();
    }
}



    // Tambahkan fungsi admin untuk mengubah status
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,selesai',
        ]);

        $order->update([
            'status' => $validated['status'],
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
