<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('menu', [
            'products' => Products::all()
        ]);
    }
    // Menyimpan Pesanan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'menu' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'paymentMethod' => 'required|in:COD,QRIS',
        ]);

        // Menyimpan data pesanan ke dalam database
        $order = Order::create([
            'nama_pembeli' => $validated['name'],
            'product_id' => $validated['menu'], // ID produk yang dipilih
            'alamat' => $validated['address'],
            'jumlah' => $validated['quantity'],
            'total' => $validated['quantity'] * Product::find($validated['menu'])->harga,
            'status' => 'pending', // Set default status pesanan
            'payment' => $validated['paymentMethod'],
        ]);

        // Kembali ke halaman sebelumnya dengan success message
        return redirect()->route('form.pesan')->with('success', 'Pesanan Anda berhasil dikirim!');
    }
}
