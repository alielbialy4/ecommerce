<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserAdminController;

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


Route::get('/dashboard/admin', function () {
    return view('admin.index');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth:admin')->prefix('admin')->group(function () {

    ##################### sections #######################
    Route::get('/sections', [SectionController::class, 'index'])->name('section.index');
    Route::get('/sections/add', [SectionController::class, 'create'])->name('section.add');
    Route::post('/sections/store', [SectionController::class, 'store'])->name('section.store');
    Route::get('/sections/show/{id}', [SectionController::class, 'show'])->name('section.show');
    Route::post('/sections/edit', [SectionController::class, 'update'])->name('section.edit');
    Route::delete('/sections/delete', [SectionController::class, 'destroy'])->name('section.destroy');
    Route::post('/sections/status', [SectionController::class, 'changeStatus'])->name('section.status');

    ######################################## products ###################################
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/edit/submit', [ProductController::class, 'editProduct'])->name('product.edit.submit');
    Route::get('/products/show', [ProductController::class, 'index'])->name('product.show');
 
    // start Deposit goods
    Route::get('/products/deposit/', [ProductController::class, 'DepositView'])->name('product.deposit');
    Route::post('/products/deposit/submit', [ProductController::class, 'DepositOfProducts'])->name('product.deposit.submit');
    // end Deposit goods


    Route::delete('/products/destroy', [ProductController::class, 'destroy'])->name('product.destroy');


    ######################################## users ###################################

    Route::get('/users', [UserAdminController::class, 'index'])->name('users.admin.index');
    Route::post('/users/status', [UserAdminController::class, 'changeStatus'])->name('users.status');
    Route::delete('/users/destroy', [UserAdminController::class, 'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/test', function () {
    return view('admin.form-advanced');
});
