<?php

use App\Http\Controllers\CategoriController;
use App\Models\Items;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Models\Categori;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index', [
        'title' => 'Home',
        'items' => Items::latest()->paginate(8),
    ]);
});

Route::get('/about', function () {
    return view('about.index', [
        'title' => 'About',
    ]);
});

Route::get('/product', function () {
    $items = Items::latest();

    if (request('navbar')) {
        $items = Items::where('name', 'like', '%' . request('navbar') . '%')
            ->orWhere('price', 'like', '%' . request('navbar') . '%')
            ->orWhere('discount', 'like', '%' . request('navbar') . '%')
            ->orWhere('categori_id', 'like', '%' . request('navbar') . '%');
    } else {
        $items = Items::latest();
    }

    return view('product.index', [
        'title' => 'Product',
        'items' => $items->paginate(8)->withQueryString(),
        'jumbotron' => Categori::all(),
        'all' => Items::paginate(8)->withQueryString(),
    ]);
});

Route::get('/product/{categori:slug}', function (Categori $categori) {
    return view('product.show', [
        'title' => $categori->name,
        'items' => $categori->items()->paginate(8)->withQueryString(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // post keranjang
    Route::controller(ItemsController::class)->group(function () {
        Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
        Route::get('/items/create', [ItemsController::class, 'create'])->name('items.create');
        Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
        Route::get('/items/{item}', [ItemsController::class, 'show'])->name('items.show');
        Route::get('/items/{item:slug}/edit', [ItemsController::class, 'edit'])->name('items.edit');
        Route::patch('/items/{item:slug}', [ItemsController::class, 'update'])->name('items.update');
        Route::delete('/items/{item:slug}', [ItemsController::class, 'destroy'])->name('items.destroy');
    });

    // category
    Route::controller(CategoriController::class)->group(function () {
        Route::get('/categori', [CategoriController::class, 'index'])->name('categori.index');
        Route::get('/categori/create', [CategoriController::class, 'create'])->name('categori.create');
        Route::post('/categori', [CategoriController::class, 'store'])->name('categori.store');
        Route::get('/categori/{categori:slug}', [CategoriController::class, 'show'])->name('categori.show');
        Route::get('/categori/{categori:slug}/edit', [CategoriController::class, 'edit'])->name('categori.edit');
        Route::patch('/categori/{categori:slug}', [CategoriController::class, 'update'])->name('categori.update');
        Route::delete('/categori/{categori:slug}', [CategoriController::class, 'destroy'])->name('categori.destroy');
    });
});

require __DIR__ . '/auth.php';
