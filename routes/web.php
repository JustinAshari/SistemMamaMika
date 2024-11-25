<?php

use App\Http\Controllers\OrderController;
use App\Models\Product;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', function () {
    return Inertia::render('HomeView');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return Inertia::render('HomeView');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('AboutView');    
});

// Route::get('/formpesan', function () {
//     $products = Product::all();
//     return Inertia::render('PesanView', [
//         'products' => $products,
//     ]);
// });

Route::get('/contact', function () {
    return Inertia::render('ContactView');
});

Route::get('/login', function () {
    return Inertia::render('LoginView');
});

// Route::get('/menu', function () {
//     return Inertia::render('MenuView');
// });
// Route::get('/menu', [ProductController::class, 'index'])->name('menu');
Route::get('/menu', function () {
    $products = Product::all();
    return Inertia::render('MenuView', [
        'products' => $products,
    ]);
});

Route::get('/welcome', function () {
    return Inertia::render('Welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');


require __DIR__.'/auth.php';
