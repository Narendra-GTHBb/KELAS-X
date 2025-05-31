<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PelangganController;

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

// Frontend Routes
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('show/{id}', [FrontController::class, 'show'])->name('menu.show');

// Authentication Routes (Frontend)
Route::get('register', [FrontController::class, 'register'])->name('register');
Route::post('postregister', [FrontController::class, 'store'])->name('register.store');

Route::get('login', [FrontController::class, 'login'])->name('login'); // Ini yang diperlukan untuk error sebelumnya
Route::post('postlogin', [FrontController::class, 'postlogin'])->name('login.post');
Route::get('logout', [FrontController::class, 'logout'])->name('logout');

// Cart Routes (Frontend)
Route::middleware(['auth'])->group(function() {
    Route::get('beli/{idmenu}', [CartController::class, 'beli'])->name('cart.add');
    Route::get('hapus/{idmenu}', [CartController::class, 'hapus'])->name('cart.remove');
    Route::get('tambah/{idmenu}', [CartController::class, 'tambah'])->name('cart.increase');
    Route::get('kurang/{idmenu}', [CartController::class, 'kurang'])->name('cart.decrease');
    Route::get('cart/', [CartController::class, 'cart'])->name('cart.index');
    Route::get('batal/', [CartController::class, 'batal'])->name('cart.cancel');
    Route::get('checkout/', [CartController::class, 'checkout'])->name('cart.checkout');
});

// Admin Authentication Routes
Route::get('admin/', [AuthController::class, 'index'])->name('admin.login');
Route::post('admin/postlogin', [AuthController::class, 'postlogin'])->name('admin.login.post');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Routes with Authentication
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    
    // Admin only routes
    Route::group(['middleware' => ['CekLogin:admin']], function() {
        Route::resource('user', UserController::class)->names([
            'index' => 'admin.user.index',
            'create' => 'admin.user.create',
            'store' => 'admin.user.store',
            'show' => 'admin.user.show',
            'edit' => 'admin.user.edit',
            'update' => 'admin.user.update',
            'destroy' => 'admin.user.destroy',
        ]);
    });

    // Kasir only routes
    Route::group(['middleware' => ['CekLogin:kasir']], function() {
        Route::resource('order', OrderController::class)->only(['index', 'show', 'create', 'store'])->names([
            'index' => 'admin.kasir.order.index',
            'create' => 'admin.kasir.order.create',
            'store' => 'admin.kasir.order.store',
            'show' => 'admin.kasir.order.show',
        ]);
    });
    
    // Manager routes
    Route::group(['middleware' => ['CekLogin:manager']], function() {
        Route::resource('kategori', KategoriController::class)->names([
            'index' => 'admin.kategori.index',
            'create' => 'admin.kategori.create',
            'store' => 'admin.kategori.store',
            'show' => 'admin.kategori.show',
            'edit' => 'admin.kategori.edit',
            'update' => 'admin.kategori.update',
            'destroy' => 'admin.kategori.destroy',
        ]);
        
        Route::resource('menu', MenuController::class)->names([
            'index' => 'admin.menu.index',
            'create' => 'admin.menu.create',
            'store' => 'admin.menu.store',
            'show' => 'admin.menu.show',
            'edit' => 'admin.menu.edit',
            'update' => 'admin.menu.update',
            'destroy' => 'admin.menu.destroy',
        ]);
        
        Route::resource('order', OrderController::class)->names([
            'index' => 'admin.order.index',
            'create' => 'admin.order.create',
            'store' => 'admin.order.store',
            'show' => 'admin.order.show',
            'edit' => 'admin.order.edit',
            'update' => 'admin.order.update',
            'destroy' => 'admin.order.destroy',
        ]);
        
        Route::resource('orderdetail', OrderDetailController::class)->names([
            'index' => 'admin.orderdetail.index',
            'create' => 'admin.orderdetail.create',
            'store' => 'admin.orderdetail.store',
            'show' => 'admin.orderdetail.show',
            'edit' => 'admin.orderdetail.edit',
            'update' => 'admin.orderdetail.update',
            'destroy' => 'admin.orderdetail.destroy',
        ]);
        
        Route::resource('pelanggan', PelangganController::class)->names([
            'index' => 'admin.pelanggan.index',
            'create' => 'admin.pelanggan.create',
            'store' => 'admin.pelanggan.store',
            'show' => 'admin.pelanggan.show',
            'edit' => 'admin.pelanggan.edit',
            'update' => 'admin.pelanggan.update',
            'destroy' => 'admin.pelanggan.destroy',
        ]);
        
        // Custom routes for menu
        Route::get('select', [MenuController::class, 'select'])->name('admin.menu.select');
        Route::post('postmenu/{id}', [MenuController::class, 'update'])->name('admin.menu.update.post');
    });
});