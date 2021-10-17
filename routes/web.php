<?php

use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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

Route::get('',[ProductController::class,'index']);

Route::group(['prefix' => '/dashboard'], function(){
    Route::get('', Dashboard::class)->middleware(['auth'])->name('dashboard');
    Route::post('',[CartController::class,'store'])->name('cart.store');
});

require __DIR__.'/auth.php';
