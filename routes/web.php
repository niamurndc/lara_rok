<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PreorderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

// front controller
Route::get('/', [FrontController::class, 'index']);
Route::get('/electronics', [FrontController::class, 'electronics']);
Route::get('/products', [FrontController::class, 'products']);
Route::get('/authors', [FrontController::class, 'authorAll']);
Route::get('/blog', [FrontController::class, 'blog']);
Route::get('/search', [FrontController::class, 'search']);
Route::get('/cart', [FrontController::class, 'cart']);
Route::get('/cart/add/{id}', [FrontController::class, 'addcart']);
Route::get('/cart/delete/{id}', [FrontController::class, 'deletecart']);
Route::get('/edit/cart/{id}', [FrontController::class, 'editcart']);
Route::get('/preorder/add/{id}', [FrontController::class, 'preorder']);


// view
Route::get('/blog/view/{id}', [FrontController::class, 'viewblog']);
Route::get('/category/{id}', [FrontController::class, 'viewcat']);
Route::get('/brand/{id}', [FrontController::class, 'viewbrand']);
Route::get('/author/{id}', [FrontController::class, 'viewauth']);
Route::get('/product/{id}', [FrontController::class, 'viewpro']);

// user controller
Route::get('/checkout', [UserController::class, 'checkout']);
Route::post('/checkout', [UserController::class, 'makeorder']);
Route::get('/order', [UserController::class, 'order']);
Route::get('/order/view/{id}', [UserController::class, 'vieworder']);
Route::post('/review/add/{id}', [UserController::class, 'addreview']);
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/change/password/{id}', [UserController::class, 'changepass']);


Auth::routes();

Route::get('/home', [UserController::class, 'profile'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('editor');

// admin brand 
Route::get('/admin/brands', [BrandController::class, 'index']);
Route::get('/admin/brand/add', [BrandController::class, 'create']);
Route::post('/admin/brand/add', [BrandController::class, 'store']);
Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit']);
Route::get('/admin/brand/delete/{id}', [BrandController::class, 'delete']);
Route::post('/admin/brand/edit/{id}', [BrandController::class, 'update']);

// admin author 
Route::get('/admin/authors', [AuthorController::class, 'index']);
Route::get('/admin/author/add', [AuthorController::class, 'create']);
Route::post('/admin/author/add', [AuthorController::class, 'store']);
Route::get('/admin/author/edit/{id}', [AuthorController::class, 'edit']);
Route::get('/admin/author/delete/{id}', [AuthorController::class, 'delete']);
Route::post('/admin/author/edit/{id}', [AuthorController::class, 'update']);


// admin category
Route::get('/admin/categories', [CategoryController::class, 'index']);
Route::get('/admin/category/add', [CategoryController::class, 'create']);
Route::post('/admin/category/add', [CategoryController::class, 'store']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);
Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update']);

// admin blog 
Route::get('/admin/blogs', [BlogController::class, 'index']);
Route::get('/admin/blog/add', [BlogController::class, 'create']);
Route::post('/admin/blog/add', [BlogController::class, 'store']);
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit']);
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete']);
Route::post('/admin/blog/edit/{id}', [BlogController::class, 'update']);

// admin product 
Route::get('/admin/products', [ProductController::class, 'index']);
Route::get('/admin/product/add', [ProductController::class, 'create']);
Route::post('/admin/product/add', [ProductController::class, 'store']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete']);
Route::post('/admin/product/edit/{id}', [ProductController::class, 'update']);

// admin order 
Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/order/view/{id}', [OrderController::class, 'view']);
Route::post('/admin/order/update/{id}', [OrderController::class, 'update']);
Route::get('/admin/order/delete/{id}', [OrderController::class, 'delete']);

// admin customer
Route::get('/admin/customers', [CustomerController::class, 'index']);
Route::get('/admin/customer/view/{id}', [CustomerController::class, 'edit']);
Route::post('/admin/customer/edit/{id}', [CustomerController::class, 'update']);
Route::get('/admin/customer/delete/{id}', [CustomerController::class, 'delete']);

// admin setting
Route::get('/admin/setting', [SettingController::class, 'index']);
Route::post('/admin/setting', [SettingController::class, 'update']);

// admin review
Route::get('/admin/reviews', [ReviewController::class, 'index']);
Route::get('/admin/review/edit/{id}', [ReviewController::class, 'update']);
Route::get('/admin/review/delete/{id}', [ReviewController::class, 'delete']);

// admin request
Route::get('/admin/preorders', [PreorderController::class, 'index']);
Route::get('/admin/preorder/delete/{id}', [PreorderController::class, 'delete']);