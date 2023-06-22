<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\LoginandregisterController;
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








Route::get('login', [UserController::class, 'login']);
Route::post('login_pro', [UserController::class, 'checkuser'])->name('auth.checkuser');
Route::get('logout', function () {
    session()->forget('USER_LOGIN');
    session()->forget('USER_ID');
    session()->forget('LoggedUser'); 
    
    session()->forget('VENDOR_LOGIN');
    session()->forget('VENDOR_ID');
    session()->forget('LoggedVendor');
    
    session()->flash('error','Logout sucessfully');
    return redirect('/login');
});

Route::post('user/register_pro', [UserController::class, 'reguser'])->name('auth.reguser');



Route::post('vendor/register_pro', [VendorController::class, 'regvendor'])->name('auth.regvendor');


Route::get('/', [UserController::class, 'index']);


Route::get('/autocomplete-search', [UserController::class, 'autocompleteSearch']);
Route::post('/search_process', [UserController::class, 'search_process']);


Route::get('/shop', function () {
    return view('user/pages/shop');
});
 

Route::get('/cat-shop/{id}', [UserController::class, 'cat_shop']);

Route::get('/shop', [UserController::class, 'shop']);
Route::get('/shop-detail/{bid}', [UserController::class, 'shop_detail']);


Route::get('/about-us', function () {
    return view('user/pages/about-us');
});

Route::get('/contact', function () {
    return view('user/pages/contact');
});
Route::post('/upload_contact', [UserController::class, 'upload_contact']);





Route::get('user/profile', [UserController::class, 'user_profile']);
Route::post('change_user_password', [UserController::class, 'change_user_password']);


Route::get('/home_add_to_cart/{bid}/{tp}/{qty}', [UserController::class, 'home_add_to_cart']);
Route::post('/add_to_cart', [UserController::class, 'add_to_cart']);
Route::get('/cart', [UserController::class, 'cart']);
Route::get('/delete_from_cart/{id}', [UserController::class, 'delete_from_cart']);

Route::get('/checkout', [UserController::class, 'checkout']);
Route::post('checkout_process', [UserController::class, 'checkout_process']);





Route::get('/orders', function () {
    return view('user/pages/orders');
});




Route::get('vendor/profile', [UserController::class, 'vendor_profile']);
Route::get('vendor_order_details/{id}', [UserController::class, 'vendor_order_details']);
Route::post('change_vendor_password', [UserController::class, 'change_vendor_password']);
Route::post('add_books', [UserController::class, 'add_books']);






/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::get('admin/hash', [AdminController::class, 'ahashp']);

//login section
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login_pro', [AdminController::class, 'checkadmin'])->name('auth.checkadmin');
Route::get('admin/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->forget('LoggedAdmin');
    session()->flash('error','Logout sucessfully');
    return redirect('admin/login');
});



Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/home', [AdminController::class, 'index']);
    
    Route::get('admin/contact', [AdminController::class, 'contact']);
    
    Route::get('admin/books', [AdminController::class, 'admin_books']); 
    Route::get("/set_book/{status}/{id}",[AdminController::class,"set_book"]);
    Route::get("/set_bestseller/{status}/{id}",[AdminController::class,"set_bestseller"]);
    Route::get("/delete_book/{id}",[AdminController::class,"delete_book"]);
    
    Route::get('admin/events', [AdminController::class, 'admin_events']);
    Route::post('admin_upload_events', [AdminController::class, 'admin_upload_events']);
    Route::get("/set_event/{status}/{id}",[AdminController::class,"set_event"]);
    Route::get("/delete_event/{id}",[AdminController::class,"delete_event"]);
    
    Route::get('admin/news', [AdminController::class, 'admin_news']);
    Route::post('admin_upload_news', [AdminController::class, 'admin_upload_news']);
    Route::get("/set_news/{status}/{id}",[AdminController::class,"set_news"]);
    Route::get("/delete_news/{id}",[AdminController::class,"delete_news"]);
     
    });
    
    
    