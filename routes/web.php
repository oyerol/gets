<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Home routes
Route::get('/',[HomeController::class,'home']);
Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('product_details/{id}',[HomeController::class, 'product_details']);
Route::get('add_cart/{id}',[HomeController::class, 'add_cart'])->middleware(['auth','verified']);
route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth','verified']);
Route::delete('/cart/{id}', [HomeController::class, 'remove'])->name('cart.remove');
route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth','verified']);
route::get('/myorders',[HomeController::class,'myorders'])->middleware(['auth','verified']);
route::post('contactus',[HomeController::class,'contactus']);
route::get('product',[HomeController::class,'product']);

// stripe
Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});



// Admin routes
route::get('admin/dashboard',[AdminController::class, 'index'])->middleware(['auth','admin']);
// route::get('view_category',[AdminController::class, 'view_category'])->middleware(['auth','admin']);
Route::get('view_category', [AdminController::class, 'view_category'])->name('view_category')->middleware(['auth', 'admin']);
route::post('add_category',[AdminController::class, 'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}',[AdminController::class, 'delete_category'])->middleware(['auth','admin']);
// route::get('edit_category/{id}',[AdminController::class, 'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}',[AdminController::class, 'update_category'])->middleware(['auth','admin']);
route::get('add_product',[AdminController::class, 'add_product']);
route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);
route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);
route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);
route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);
route::get('view_orders',[AdminController::class,'view_orders'])->middleware(['auth','admin']);
Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);
Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);
Route::delete('order_delete/{id}',[AdminController::class,'order_delete'])->middleware(['auth','admin']);
Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);
Route::get('showcontact', [AdminController::class, 'showcontact'])->middleware(['auth', 'admin']);
Route::delete('delete_contactus/{id}', [AdminController::class, 'delete_contactus'])->middleware(['auth', 'admin']);
Route::get('customers_view', [AdminController::class, 'customers_view'])->middleware(['auth', 'admin']);
Route::post('customers_viewadd', [AdminController::class, 'customers_viewadd'])->middleware(['auth', 'admin']);
// Route::post('customers_viewadd', [AdminController::class, 'customers_viewadd'])->middleware(['auth', 'admin']);
Route::delete('customers_viewdelete/{id}', [AdminController::class, 'customers_viewdelete'])->middleware(['auth', 'admin']);



