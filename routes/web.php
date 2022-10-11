<?php

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







// forget password 

Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[App\Http\Controllers\Frontend\HomeController::class,'Homes'])->name('Home');


Route::get('/view-categories/{slug}' , [App\Http\Controllers\Frontend\ProductController::class, 'viewcategory']);
Route::get('/product',[App\Http\Controllers\Frontend\ProductController::class,'Products'])->name('products-info');
Route::get('/productdetail/{slug}',[App\Http\Controllers\Frontend\ProductController::class,'Productview']);
Route::get('/view-category/{cate_slug}/{prod_slug}',[App\Http\Controllers\Frontend\ProductController::class, 'details']);
Route::get('product-search',[App\Http\Controllers\Frontend\ProductController::class, 'searchProduct']);
Route::post('search-product',[App\Http\Controllers\Frontend\ProductController::class, 'Productsearch']);


Route::get('/arrival',[App\Http\Controllers\Frontend\NewController::class, 'New']);
Route::get('/contact',[App\Http\Controllers\Frontend\ContactController::class,'Contacts']);
Route::post('/contact-us', [App\Http\Controllers\Frontend\ContactController::class, 'save'])->name('contact.store');



Route::post('/add-to-cart',[App\Http\Controllers\Frontend\CartController::class, 'cartList']);
Route::post('/delete-cart-item',[App\Http\Controllers\Frontend\CartController::class,'deleteproduct']);
Route::post('/update-cart',[App\Http\Controllers\Frontend\CartController::class,'updatecart']);

Route::post('add-to-wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'addWishlist']);
Route::post('remove-wishlist-item',[App\Http\Controllers\Frontend\WishlistController::class, 'removeWishlist']);

Route::get('/load-cart-item',[App\Http\Controllers\Frontend\CartController::class, 'cartCount']);
Route::get('/load-wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'wishlistCount']);


Route::middleware(['auth'])->group(function(){
    Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class, 'viewcart']);
    Route::get('checkout',[App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');
    Route::post('place-order',[App\Http\Controllers\Frontend\CheckoutController::class, 'placeOrder']);
    Route::get('my-order',[App\Http\Controllers\Frontend\UserController::class,'index']);
    Route::get('view-order/{id}',[App\Http\Controllers\Frontend\UserController::class,'view']);


    Route::get('payment/{orderId}',[App\Http\Controllers\Frontend\CheckoutController::class, 'payment'])->name('payment');


    Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'index']);

    Route::any('esewa/{orderId}',[App\Http\Controllers\Frontend\EsewaController::class, 'paymentEsewa'])->name('esewa.payment');
    Route::any('esewa-success/{orderID}',[App\Http\Controllers\Frontend\EsewaController::class, 'SuccessEsewa'])->name('esewa.success');
    Route::any('esewa-failure/{orderID}',[App\Http\Controllers\Frontend\EsewaController::class, 'FailEsewa'])->name('esewa.fail');

    Route::any('fonepay/{orderId}',[App\Http\Controllers\Frontend\FonepayController::class, 'PaymentFonepay'])->name('fonepay.payment');
    
    Route::any('fonepayReturn',[App\Http\Controllers\Frontend\FonepayController::class, 'FonepayReturn'])->name('fonepay.return');
  
    


    
    
});





Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\Admin\dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/landing',[App\Http\Controllers\Admin\LandingController::class, 'index'])->name('landings');
    // category 
    Route::get('/category-info',[App\Http\Controllers\Admin\category\CategoryController::class, 'index'])->name('category');
    Route::get('/category-add',[App\Http\Controllers\Admin\category\CategoryController::class, 'add'])->name('add-category');
    Route::post('/category-insert',[App\Http\Controllers\Admin\category\CategoryController::class, 'insert'])->name('insert-category');
    Route::get('/category-edit/{id}',[App\Http\Controllers\Admin\category\CategoryController::class, 'edit'])->name('edit-category');
    Route::put('/category-update/{id}',[App\Http\Controllers\Admin\category\CategoryController::class, 'update'])->name('update-category');
   
    // product
    Route::get('/product-info',[App\Http\Controllers\Admin\product\ProductController::class, 'index'])->name('product');
    Route::get('/product-add',[App\Http\Controllers\Admin\product\ProductController::class, 'add'])->name('add-product');
    Route::post('/product-insert',[App\Http\Controllers\Admin\product\ProductController::class, 'insert'])->name('insert-product');
    Route::get('/product-edit/{id}',[App\Http\Controllers\Admin\product\ProductController::class, 'edit'])->name('edit-product');
    Route::put('/product-update/{id}',[App\Http\Controllers\Admin\product\ProductController::class, 'update'])->name('update-product');
// order
    Route::get('/order-info',[App\Http\Controllers\Admin\order\OrderController::class,'index'])->name('order');
    Route::get('/admin-view-order/{id}',[App\Http\Controllers\Admin\order\OrderController::class,'orderview'])->name('admin-order');
    ROute::put('/update-order/{id}',[App\Http\Controllers\Admin\order\OrderController::class,'updateorder']);

    // user
    Route::get('/user-info',[App\Http\Controllers\Admin\User\UsersController::class,'index'])->name('username');
    Route::get('/user-view/{id}',[App\Http\Controllers\Admin\User\UsersController::class,'viewUser'])->name('userview');

    


});


Auth::routes();