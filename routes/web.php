<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WDController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WDController::class, 'index']);

Route::get('/index', [WDController::class, 'index']);

Route::get('/product', [WDController::class, 'product']);

Route::get('/wishlist', [WDController::class, 'wishlist']);

Route::get('/cart', [WDController::class, 'cart']);

Route::get('/admin', function(){
    return view('admin/index', [
        'pagetitle' => 'Admin'
    ]);
})->middleware(['admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
