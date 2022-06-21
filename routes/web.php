<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PdfController;

Route::get('/', function(){
    return view('home');
});

Route::get('/admin', function(){
    return view('backend.dashboard');
});


Route::prefix('product')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');

    Route::get('/trashlist', [ProductController::class, 'trashList'])->name('product.trashlist');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::delete('/permanent_delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
});


Route::prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');

    // trash routes 
    Route::get('/trashlist', [CategoryController::class, 'trashList'])->name('category.trashlist');
    Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/permanent_delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){
    Route::get('/admin', function(){
        return view('backend.dashboard');
    });
    
    
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');

        // trash routes 
        Route::get('/trashlist', [ProductController::class, 'trashList'])->name('product.trashlist');
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
        Route::delete('/permanent_delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });
    
    
    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    
        // trash routes 
        Route::get('/trashlist', [CategoryController::class, 'trashList'])->name('category.trashlist');
        Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::delete('/permanent_delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    
    
    });
    
    Route::prefix('brand')->group(function(){
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
    });
    
    
    // color routes
    
    Route::prefix('color')->group(function(){
        Route::get('/', [ColorController::class, 'index'])->name('color.index');
        Route::get('/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/store', [ColorController::class, 'store'])->name('color.store');
        Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('/update/{id}', [ColorController::class, 'update'])->name('color.update');
    });
    
    // pdf 
    
    Route::get('/category_pdf', [PdfController::class, 'categoryPdf'])->name('category.pdf');
    
    // excel
    Route::get('/category_excel', [CategoryController::class, 'export'])->name('category.excel');
    Route::get('/product_excel', [ProductController::class, 'export'])->name('product.excel');
    
    
    
});