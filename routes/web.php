<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContollerContact;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
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
    return view('home',compact('brands'));
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








// Multiple Images Brand Controller
Route::get('/multi/all',[BrandController::class,'MultiImages'])->name('multi.image');
Route::post('/multi/add',[BrandController::class,'MultiImageAdd'])->name('store.image');
Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
