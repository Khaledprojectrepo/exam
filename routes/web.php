<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreFrontController;

Route::fallback(function () {
    return redirect()->route('login');
});
// =============================
// 🔹 AUTH ROUTES (Shared Login)
// =============================
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// =============================
// 🔹 ADMIN ROUTES
// =============================
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// =============================
// 🔹 MERCHANT ROUTES
// =============================
Route::prefix('merchant')->middleware(['auth','role:merchant'])->group(function () {
    Route::get('/dashboard', [MerchantController::class, 'index'])->name('merchant.dashboard');

    // Store Management
    Route::get('/store-list', [StoreController::class, 'index'])->name('merchant.store.list');
    Route::get('/create-store', [StoreController::class, 'create'])->name('merchant.create.store');
    Route::post('/create-store', [StoreController::class, 'store']);

    // Category Management
    Route::get('/category-list', [CategoryController::class, 'index'])->name('merchant.category.list');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('merchant.create.category');
    Route::post('/create-category', [CategoryController::class, 'store']);

    // Product Management
    Route::get('/product-list', [ProductController::class, 'index'])->name('merchant.product.list');
    Route::get('/create-product', [ProductController::class, 'create'])->name('merchant.create.product');
    Route::post('/create-product', [ProductController::class, 'store']);
});

// =============================
// 🔹 TENANT-BASED SHOP ROUTES
// =============================
Route::domain('{shop}.merchant.localhost')->group(function () {
    Route::get('/', [StoreFrontController::class, 'index'])->name('front.page');
    Route::get('/category/{category}', [StoreFrontController::class, 'product'])->name('front.product');
});


require __DIR__.'/auth.php';     