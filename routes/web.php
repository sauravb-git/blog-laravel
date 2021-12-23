<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContollerContact;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Multipic;
// use App\Models\User;
use Illuminate\Support\Facades\DB;


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

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $multipics = Multipic::all();
    return view('home',compact('brands','abouts','multipics'));
});

Route::get('/home', function () {
   echo "This is Home Page";
});

Route::get('/contact', function () {
    return view('contact');
})->middleware('check');


Route::get('/about-to-me',[ContollerContact::class,'index'])->name('saurav');

// Create Category Controller
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit']);
Route::post('/category/update/{id}',[CategoryController::class,'Update']);
Route::get('/category/softdelete/{id}',[CategoryController::class,'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'SoftRestore']);
Route::get('/category/pdelete/{id}',[CategoryController::class,'Pdelete']);




// Create Brand Controller
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);



// home silder controller

Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');


//  home about  controller

Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class,'AddAbout'])->name('add.about');
Route::post('/store/about',[AboutController::class,'StoreAbout'])->name('store.about');
Route::get('/edit/about/{id}',[AboutController::class,'EditAbout']);
Route::post('/update/about/{id}',[AboutController::class,'UpdateAbout']);
Route::get('/delete/about/{id}',[AboutController::class,'UpdateDelete']);

// Prorfolio Page Route
Route::get('/portfolio',[AboutController::class,'Portfolio'])->name('portfolio');

// contact profile update admin
Route::get('/home/contact',[ContactController::class,'HomeContact'])->name('home.contact');
Route::get('/add/contact',[ContactController::class,'AddContact'])->name('add.contact');
Route::post('/store/contact',[ContactController::class,'StoreContact'])->name('store.contact');
Route::get('/edit/contact/{id}',[ContactController::class,'EditContact']);
Route::post('/update/contact/{id}',[ContactController::class,'UpdateContact']);


// contact message admin

Route::get('/admin/contact',[ContactController::class,'ContactFormAdmin'])->name('contact.admin');
Route::get('/admin/mdelete/{id}',[ContactController::class,'Mdelete']);


// contact page page route
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');
Route::post('/contact',[ContactController::class,'ContactForm'])->name('contact.form');






// Multiple Images Brand Controller
Route::get('/multi/all',[BrandController::class,'MultiImages'])->name('multi.image');
Route::post('/multi/add',[BrandController::class,'MultiImageAdd'])->name('store.image');
Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');



// Chanage Password and User Profile Route

Route::get('/user/password',[ChangePass::class,'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'UPassword'])->name('password.update');



// update.user.profile
// profile update function

Route::get('/profile/update',[ChangePass::class,'UProfile'])->name('profile.update');

Route::post('/user/profile/update',[ChangePass::class,'UPUProfile'])->name('update.user.profile');

