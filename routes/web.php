<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;

// Visitor Controllers
use App\Http\Controllers\Visitor\VisitorProductController;
use App\Http\Controllers\Visitor\VisitorCartController;
use App\Http\Controllers\Visitor\VisitorCartItemController;
use App\Http\Controllers\Visitor\VisitorOrderController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


// Route::prefix('products')->group(function () {
//     Route::get('/', [ProductController::class, 'index'])->name('products.index');
//     Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
// });


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'permission'])->prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin.roles.index');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.products.index');
    });
});

// Product browsing (visitor)
Route::get('/products', [VisitorProductController::class, 'index'])->name('visitor.products.index');
Route::get('/products/{product}', [VisitorProductController::class, 'show'])->name('products.show');

// Cart routes
Route::get('/cart', [VisitorCartController::class, 'show'])->name('visitor.cart.show');
Route::post('/cart/add', [VisitorCartController::class, 'store'])->name('cart.add');
Route::patch('/cart/update/{cartItem}', [VisitorCartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cartItem}', [VisitorCartController::class, 'destroy'])->name('cart.remove');

// cancel order
Route::post('/orders/{order}/cancel', [VisitorOrderController::class, 'cancel'])->name('orders.cancel');

// Checkout / Orders
Route::get('/checkout', [VisitorOrderController::class, 'create'])->name('visitor.checkout.create');
Route::post('/checkout', [VisitorOrderController::class, 'store'])->name('checkout.store');
Route::get('/orders/{order}', [VisitorOrderController::class, 'show'])->name('orders.show');

require __DIR__.'/auth.php';
