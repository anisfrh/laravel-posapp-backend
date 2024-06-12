<?php

use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Controllers\Admin\DataUser\DataUserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\User\UserController;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Akses Admin

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::controller(AdminBaseController::class)->group(function(){
        Route::get('/home','index')->name('index.home');
    });
    Route::controller(DataUserController::class)->group(function(){
        Route::get('/dataUser','dataUser')->name('index.dataUser');
        Route::get('/dataUser/form','dataUserForm')->name('dataUser.form');
        Route::post('/dataUser/form/create','dataUserCreate')->name('dataUser.create');
        Route::delete('/dataUser/form/delete','dataUserDelete')->name('dataUser.delete');
        Route::get('/dataUser/search','dataUserSearch')->name('dataUser.search');
    });
    // Produk
    Route::controller(ProdukController::class)->group(function(){
        Route::get('/produk','indexProduk')->name('index.produk');
        Route::get('/dataProduk/form','dataProdukForm')->name('dataProduk.form');
        Route::post('/dataProduk/form/create','dataProdukCreate')->name('dataProduk.create');
        Route::get('/dataProduk/form/edit/{id}','dataProdukEdit')->name('dataProduk.form.edit');
        Route::put('/dataProduk/form/update/{id}','dataProdukUpdate')->name('dataProduk.update');
        Route::get('/dataProduk/search','dataProdukSearch')->name('dataProduk.search');
        Route::delete('/dataProduk/form/delete','dataProdukDelete')->name('dataProduk.delete');
    });
    Route::resource('order', OrderController::class);
    Route::resource('order_item', OrderItemController::class);
});

// Akses Staff

Route::prefix('staff')->middleware(['auth','isStaff'])->group(function() {
    Route::controller(StaffController::class)->group(function(){
        Route::get('/home','index')->name('index.staff.home');
    });
});

// Akses User

Route::prefix('user')->middleware(['auth','isUser'])->group(function() {
    Route::controller(UserController::class)->group(function(){
        Route::get('/home','index')->name('index.user.home');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
