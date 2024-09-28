<?php

use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactFormController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('front.home');
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('front.about-us');
Route::get('/contact-us', [IndexController::class, 'contactUs'])->name('front.contact-us');
Route::post('/contact-us', [ContactFormController::class, 'sendContactForm'])->name('contact.submit');
Route::get('/our-products', [IndexController::class, 'ourProducts'])->name('products.ourAllProducts');
Route::get('/categories', [IndexController::class, 'ourcategories'])->name('categories');
Route::get('/product/{slug}', [IndexController::class, 'show'])->name('products.show');
Route::get('/category/{slug}', [IndexController::class, 'categoryProducts'])->name('categories.products');

Route::get('/related-products/{category}', [IndexController::class, 'showRelatedProducts'])->name('related.products');



Route::get('/admin/login', [IndexController::class, 'adminlogin'])->name('admin.logAdmin');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');






//admin routes --------------------->
// Route::middleware([Admin::class])->group(function () {
    Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-products', [AdminController::class, 'productsAdmin'])->name('allproducts');
    Route::get('/admin-category', [AdminController::class, 'categoryAdmin'])->name('allCategories');
    Route::get('/admin-size', [AdminController::class, 'sizesAdmin'])->name('allSizes');
    Route::get('delete-product/{id}', [AdminController::class, 'deleteProduct'])->name('delete.product');
    Route::get('delete-size/{id}', [AdminController::class, 'deleteSize'])->name('delete.size');
    Route::get('/delete-category-with-products/{category}', [AdminController::class,'deleteCategoryWithProducts'])->name('delete.category.with.products');

    Route::post('/addnew-product', [AdminController::class, 'addnewProduct'])->name('addnewproduct');
    Route::post('/addnew-size', [AdminController::class, 'addNewSize'])->name('addNewSize');
    Route::post('/addnew-category', [AdminController::class, 'addNewCategory'])->name('addNewCategory');
    Route::get('log-out', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::post('/update-product', [AdminController::class, 'updateProduct'])->name('editnewproduct');
    Route::post('/update-category', [AdminController::class, 'updateCategory'])->name('editnewcategory');
    Route::post('/update-size', [AdminController::class, 'updateSize'])->name('editnewsize');
});

