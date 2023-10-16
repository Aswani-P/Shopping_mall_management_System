<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

//admin side route
Route::get('showUserTable',[AdminController::class,'readUser'])->name('userTable');
Route::get('shop-table',[AdminController::class,'shopTable'])->name('showShop');
Route::get('update-status/{id}',[AdminController::class,'updateBtn'])->name('updateStatus');
Route::post('updates',[AdminController::class,'update'])->name('updated');
Route::get('save/{id}',[AdminController::class,'SaveBtn'])->name('saveBtn');
Route::post('saved',[AdminController::class,'saveTo'])->name('saved');
Route::get('delete/{id}',[AdminController::class,'deleteShops'])->name('deleteShops');
Route::get('deleteUser/{id}',[AdminController::class,'userDelete'])->name('userdelete');
Route::get('deleteShop/{id}',[AdminController::class,'deleteShop'])->name('deleteShop');
Route::get('all-products',[AdminController::class,'viewAllProducts'])->name('AllProduct');
Route::get('deleteProducts/{id}',[AdminController::class,'deleteadminsideProduct'])->name('delete');
Route::post('adminUpdat',[AdminController::class,'updateAdminProduct'])->name('adminUpdate');
Route::get('adminEdit/{id}',[AdminController::class,'updateAdminProductForm'])->name('adminEdit');
Route::get('product-list',[AdminController::class,'pdfDownload'])->name('product_list');





//shop side route
Route::get('shopRegisterForm',[ShopController::class,'registerForm'])->name('form');
Route::post('registered',[ShopController::class,'register'])->name('save');
Route::get('regiser-successfully',[ShopController::class,'viewAprovedTable'])->name('afterReturn');
// Route::get('shop-approval',[ShopController::class,'Approval'])->name('approval');
Route::get('shope-home',[ShopController::class,'shopHomeview'])->name('shopHome');


//product side route
Route::get('productform/{id}',[ProductController::class,'ViewProductForm'])->name('productForm');
Route::get('viewProducts',[ProductController::class,'viewTableProducts'])->name('viewProducts');
Route::post('addproducts/{id}',[ProductController::class,'storeProductForm'])->name('storeProducts');
Route::get('edit-product-form/{id}',[ProductController::class,'updateProductForm'])->name('editProduct');
Route::post('updateProduct',[ProductController::class,'updateProduct'])->name('updateProductForm');
Route::get('deleteProduct/{id}',[ProductController::class,' deleteProduct'])->name('deleteProduct');
// Route::get('add-product',[ProductController::class,'viewAddProductForm'])->name('addProduct');

// route for filtering

Route::post('/filter',[UserController::class,'filtering_category']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
