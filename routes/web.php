<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',[HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/product')->group(function (){
        Route::get('/all',[ProductController::class,'index'])->name('product.all');
        Route::get('/add',[ProductController::class,'create'])->name('product.add');
        Route::post('/upload',[ProductController::class,'store'])->name('product.upload');

        Route::get('/single/{id}',[ProductController::class,'show'])->name('product.single');

        Route::post('/bidding-auction',[AuctionController::class,'bidding'])->name('product.bidding');
        Route::post('/buy-now-auction',[AuctionController::class,'buyNow'])->name('product.buy.now');

    });


});

require __DIR__.'/auth.php';
