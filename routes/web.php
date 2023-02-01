<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\FrontController;


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

Route::get('admin', [IndexController::class, 'index']);
Route::post('admin', [IndexController::class, 'adminLogin']);
Route::get('admin/logout', [IndexController::class, 'logout']);
Route::get('admin/dashboard', [IndexController::class, 'dashboard'])->middleware('admin');
Route::get('admin/product-list', [ProductController::class, 'productList'])->middleware('admin');
Route::get('admin/add-product', [ProductController::class, 'addProduct'])->middleware('admin');
Route::post('admin/add-product', [ProductController::class, 'SaveProduct'])->middleware('admin');
Route::get('admin/edit-product/{ProductSlug}', [ProductController::class, 'editProduct'])->middleware('admin');
Route::post('admin/edit-product/{ProductSlug}', [ProductController::class, 'updateProduct'])->middleware('admin');
Route::get('admin/categories-list', [ProductController::class, 'categoriesList'])->middleware('admin');
Route::get('admin/add-category', [ProductController::class, 'addCategory'])->middleware('admin');
Route::post('admin/add-category', [ProductController::class, 'saveCategory'])->middleware('admin');
Route::get('admin/edit-category/{categorySlug}', [ProductController::class, 'editCategory'])->middleware('admin');
Route::post('admin/edit-category/{categorySlug}', [ProductController::class, 'updateCategory'])->middleware('admin');
Route::get('admin/posts', [PostsController::class, 'posts'])->middleware('admin');
Route::get('post/add', [PostsController::class, 'postAdd'])->middleware('admin');
Route::get('admin/posts/categories', [PostsController::class, 'postsCategories'])->middleware('admin');
Route::get('admin/posts/categories/add', [PostsController::class, 'AddPostsCategories'])->middleware('admin');
Route::post('admin/posts/categories/add', [PostsController::class, 'SavePostsCategories'])->middleware('admin');

Route::get('/', [FrontController::class, 'index']); 

