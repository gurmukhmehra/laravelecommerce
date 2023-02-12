<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\UserController;

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

Route::get('admin/maintenance-addon', [ProductController::class, 'MaintenanceAddon'])->middleware('admin');
Route::get('admin/maintenance-addon/add', [ProductController::class, 'AddMaintenanceAddon'])->middleware('admin');
Route::post('admin/maintenance-addon/add', [ProductController::class, 'SaveMaintenanceAddon'])->middleware('admin');

Route::get('admin/features', [ProductController::class, 'featuresList'])->middleware('admin');
Route::get('admin/features/add', [ProductController::class, 'AddFeatures'])->middleware('admin');
Route::post('admin/features/add', [ProductController::class, 'SaveFeatures'])->middleware('admin');

Route::get('admin/posts', [PostsController::class, 'posts'])->middleware('admin');
Route::get('admin/post/add', [PostsController::class, 'postAdd'])->middleware('admin');
Route::post('admin/post/add', [PostsController::class, 'savePost'])->middleware('admin');
Route::get('admin/post/edit/{postSlug}', [PostsController::class, 'editPost'])->middleware('admin');
Route::post('admin/post/edit/{postSlug}', [PostsController::class, 'postUpdate'])->middleware('admin');
Route::get('admin/posts/categories', [PostsController::class, 'postsCategories'])->middleware('admin');
Route::get('admin/posts/categories/add', [PostsController::class, 'AddPostsCategories'])->middleware('admin');
Route::post('admin/posts/categories/add', [PostsController::class, 'SavePostsCategories'])->middleware('admin');
Route::get('admin/posts/categories/edit/{categorySlug}', [PostsController::class, 'editPostsCategories'])->middleware('admin');
Route::post('admin/posts/categories/edit/{categorySlug}', [PostsController::class, 'updatePostsCategories'])->middleware('admin');

Route::get('admin/general-setting', [SettingsController::class, 'GeneralSetting'])->middleware('admin');
Route::post('admin/general-setting', [SettingsController::class, 'SaveGeneralSetting'])->middleware('admin');
Route::get('admin/general-setting/affiliate', [SettingsController::class, 'AffiliateSetting'])->middleware('admin');
Route::post('admin/general-setting/affiliate', [SettingsController::class, 'SaveAffiliateSetting'])->middleware('admin');

Route::get('/', [FrontController::class, 'index']); 
Route::get('/about-us', [FrontController::class, 'aboutUs']); 
Route::get('/shop', [FrontController::class, 'shop']); 
Route::get('/affiliate', [FrontController::class, 'affiliate']); 
Route::get('/blogs', [FrontController::class, 'blogs']);
Route::get('/contact-us', [FrontController::class, 'contactUs']); 
Route::get('/term-and-condination', [FrontController::class, 'termAndCondination']); 
Route::get('/privacy-policy', [FrontController::class, 'privacyPolicy']);
Route::get('product-detail/{ProductSlug}', [FrontProductController::class, 'singleProduct']);
Route::get('sign-up', [UserController::class, 'signUp']);
Route::post('sign-up', [UserController::class, 'SaveSignUpfields']);
Route::get('sign-in', [UserController::class, 'login']);
Route::post('sign-in', [UserController::class, 'loginRequest']);
Route::get('logout', [UserController::class, 'logout']);
Route::get('profile', [UserController::class, 'profile']);

Route::post('addtocart', [FrontProductController::class, 'addtocart'])->middleware('customer');
Route::get('remove-cart-item/{cartProductID}', [FrontProductController::class, 'RemoveCartItem'])->middleware('customer');
Route::get('cart', [FrontProductController::class, 'cartPage'])->middleware('customer');
Route::get('checkout', [FrontProductController::class, 'checkout'])->middleware('customer');
Route::get('remove-cart-page-item/{CartItemProductID}', [FrontProductController::class, 'RemoveItemCartPage'])->middleware('customer');