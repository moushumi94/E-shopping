<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Admin\DashboardController;
use App\Http\controllers\Admin\CategoryController;
use App\Http\controllers\Admin\ProductController;
use App\Http\controllers\Frontend\FrontendController;

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

/*Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/',  [FrontendController::class, 'index']);
Route::get('/all-products/{name}',[FrontendController::class, 'allProducts'])->name('all-products');
Route::get('/all-products/{cate_name}/{prod_name}',[FrontendController::class, 'singleProducts'])->name('single-products');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



 Route::middleware(['auth','isAdmin'])->group(function() {

    Route::get('/dashboard',  [DashboardController::class, 'index']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/add-categories', [CategoryController::class, 'create'])->name('category.create');

    Route::post('/store-categories',[CategoryController::class, 'store'])->name('category.store');

    Route::get('/category-edit/{id}',[CategoryController::class, 'edit'])->name('product.edit');

    Route::post('update/{id}',[CategoryController::class, 'update'])->name('category.update');


    #products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store-products',[ProductController::class, 'store'])->name('product.store');
    Route::get('product-edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::post('update/{id}',[ProductController::class, 'update'])->name('product.update');

  /*  Route::get('product/add',[ProductController::class, 'create'])->name('product.create');
    Route::post('product/store',[ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('update/{id}',[ProductController::class, 'update'])->name('product.update');
    Route::get('delete/{id}',[ProductController::class, 'destroy'])->name('destroy'); */
 });