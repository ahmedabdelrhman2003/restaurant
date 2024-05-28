<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CardController;
use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware()->group(function () {

Route::middleware('AuthCheck')->group(function () {
    Route::get('/dashboard', [AboutController::class, 'dashboard'])->name('dashboard');
    Route::middleware('can:product')->group(function () {

        Route::get('/dashboard/create-product', [ProductController::class, 'create'])->name('dashboard.product.create');
        Route::post('/dashboard/store-product', [ProductController::class, 'store'])->name('dashboard.product.store');
        Route::post('/dashboard/update-product/{id}', [ProductController::class, 'update'])->name('dashboard.product.update');
        Route::get('/dashboard/edit-product/{id}', [ProductController::class, 'edit'])->name('dashboard.product.edit');
        Route::get('/dashboard/destroy-product/{id}', [ProductController::class, 'destroy'])->name('dashboard.product.destroy');
    });
    Route::middleware('can:product')->group(function () {
        Route::get('/dashboard/cards', [CardController::class, 'index'])->name('dashboard.card.index');
        Route::get('/dashboard/create-card', [CardController::class, 'create'])->name('dashboard.card.create');
        Route::post('/dashboard/store-card', [CardController::class, 'store'])->name('dashboard.card.store');
        Route::post('/dashboard/update-card/{id}', [CardController::class, 'update'])->name('dashboard.card.update');
        Route::get('/dashboard/edit-card/{id}', [CardController::class, 'edit'])->name('dashboard.card.edit');
        Route::get('/dashboard/destroy-card/{id}', [CardController::class, 'destroy'])->name('dashboard.card.destroy');
    });
    Route::middleware('can:about')->group(function () {
        Route::get('/dashboard/about-us', [AboutController::class, 'index'])->name('dashboard.about.index');
        Route::get('/dashboard/about-show/{id}', [AboutController::class, 'show'])->name('dashboard.about.show');
        Route::get('/dashboard/about-edit/{id}', [AboutController::class, 'edit'])->name('dashboard.about.edit');
        Route::post('/dashboard/about-update/{id}', [AboutController::class, 'update'])->name('dashboard.about.update');
    });
    Route::middleware('can:about')->group(function () {
        Route::get('/dashboard/feedback', [FeedbackController::class, 'index'])->name('dashboard.feedback.index');
        Route::get('/dashboard/reply/{id}', [FeedbackController::class, 'reply'])->name('dashboard.feedback.reply');
        Route::post('/dashboard/send/{id}', [FeedbackController::class, 'send'])->name('dashboard.feedback.send');
    });

    Route::get('/dashboard/kitchen', [AdminController::class, 'kitchen'])->name('dashboard.kitchen')->can('kitchen');
    Route::get('/dashboard/delivery', [AdminController::class, 'delivery'])->name('dashboard.delivery')->can('delivery');
    Route::get('/dashboard/prepared/{id}', [AdminController::class, 'prepared'])->name('dashboard.kitchen.prepared')->can('kitchen');
    Route::get('/dashboard/finished/{id}', [AdminController::class, 'finished'])->name('dashboard.delivery.finished')->can('delivery');

    Route::middleware('can:about')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('create-user', [AuthController::class, 'create'])->name('auth.create');
        Route::get('destroy-user/{id}', [AuthController::class, 'destroy'])->name('auth.destroy');
        Route::get('admins', [AuthController::class, 'admins'])->name('auth.admins');
        Route::get('edit-user/{id}', [AuthController::class, 'edit'])->name('auth.edit');
        Route::post('update-user/{id}', [AuthController::class, 'update'])->name('auth.update');
        Route::get('create-role', [RoleController::class, 'create'])->name('role.create');
        Route::get('destroy-role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::get('edit-role/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('update-role/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');
        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::get('/view-role/{id}', [RoleController::class, 'show'])->name('role.view');
    });
});
Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.product.index');
Route::post('/dashboard/feedback/store', [FeedbackController::class, 'store'])->name('dashboard.feedback.store');



Route::post('login-user', [AuthController::class, 'login_user'])->name('auth.login-user');
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('/callback', [PaymentController::class, 'callback'])->name('callback');
Route::get('/create-order', [OrderController::class, 'createOrder'])->name('order.create');
Route::get('/delete-cart', [CartController::class, 'delete'])->name('cart.delete');
Route::get('add-cart/{id}', [CartController::class, 'addCart'])->name('cart.add-cart');
Route::get('decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::get('/increment/{id}', [CartController::class, 'increment'])->name('cart.increment');
Route::get('/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/', [PageController::class, 'home'])->name('page.home');
Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/services', [PageController::class, 'services'])->name('page.services');
Route::get('/feedback', [PageController::class, 'feedback'])->name('page.feedback');
Route::get('/cart', [PageController::class, 'cart'])->name('page.cart');
Route::get('/menu', [PageController::class, 'menu'])->name('page.menu');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('customer-store', [CustomerController::class, 'store'])->name('customer.store');
// Route::get('payment', [PaymentController::class, 'pa'])->name('job.index');
