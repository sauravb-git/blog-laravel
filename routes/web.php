<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContollerContact;
use App\Http\Controllers\CategoryController;
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
    return view('home');
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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');