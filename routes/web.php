<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ContactController;
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
        'items' => $items->take(8)->get(),
        'jumbotron' => Categori::all(),
        'all' => Items::paginate(8)->withQueryString(),
    ]);
});

Route::get('/product/{item:slug}', function (Items $item) {
    return view('product.detail', [
        'title' => $item->name,
        'item' => $item,
        'items' => Items::where('categori_id', $item->categori_id)->take(10)->get(),
    ]);
});

Route::get('/category/{categori:slug}', function (Categori $categori) {
    return view('product.show', [
        'title' => $categori->name,
        'items' => $categori->items()->paginate(8)->withQueryString(),
    ]);
});

Route::get('/contact', function () {
    return view('contact.index', [
        'title' => 'Contact',
    ]);
})->name('contacts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::post('/register', [ProfileController::class, 'store'])->name('profile.store');
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
        Route::post('/categori', [CategoriController::class, 'store'])->name('categori.store');
        Route::get('/categori/{categori:slug}', [CategoriController::class, 'show'])->name('categori.show');
        Route::patch('/categori/{categori:slug}', [CategoriController::class, 'update'])->name('categori.update');
        Route::delete('/categori/{categori:slug}', [CategoriController::class, 'destroy'])->name('categori.destroy');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
        Route::get('/contacts/{contact:slug}', [ContactController::class, 'show'])->name('contact.show');
        Route::patch('/contacts/{contact:slug}', [ContactController::class, 'update'])->name('contact.update');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });
});

Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');


require __DIR__ . '/auth.php';
