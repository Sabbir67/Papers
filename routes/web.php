<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorJournalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JournalController;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Models\Category;
use App\Models\Journal;
use App\Models\User;


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
//Guest routes
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/all-categories',[HomeController::class,'category'])->name('category');
Route::get('/all-papers',[HomeController::class,'allpapers'])->name('allpapers');
Route::get('/about-us',[HomeController::class,'aboutus'])->name('aboutus');
Route::get('/instructions',[HomeController::class,'instruction'])->name('instruction');
Route::get('/editorialmember',[HomeController::class,'editorialmember'])->name('editorialmember');

Route::get('/paperview/{id}',[HomeController::class,'paperview'])->name('paperview');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//journal routes
Route::get('/journals',[JournalController::class,'index']);
Route::get('/journals/{id}',[JournalController::class,'show']);



//Categoris Route




Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){

   // Route::get('/login',[AdminLoginController::class,'showLoginPage'])->name('admin.login');
   // Route::post('/login',[AdminLoginController::class,'login'])->name('admin.login.submit');
     Route::get('/dashboard',[AdminLoginController::class,'showDashboard'])->name('dashboard');
    // Route::post('/logout', [AdminLoginController::class, 'destroy'])
    // ->name('admin.logout');


    //journal routes
    Route::get('/journals/create',[AuthorJournalController::class,'create']);
    Route::post('/journals',[AuthorJournalController::class,'store'])->name('journal.create');
    Route::get('/journals',[AuthorJournalController::class,'index']);
    Route::get('/journals/{id}',[AuthorJournalController::class,'show']);

    // category
    Route::get('/categories',[CategoryController::class,'index'])->name('viewcategory');
    Route::get('/category/create',[CategoryController::class,'create'])->name('createcategory');
    Route::get('/category/{id}',[CategoryController::class,'show'])->name('singlecategory');
    Route::post('/category',[CategoryController::class,'store']);
    Route::get('/category/{id}',[CategoryController::class,'edit']);
    Route::post('/category/{id}',[CategoryController::class,'update']);
    Route::delete('/delete/{id}',[CategoryController::class,'destroy'])->name('delete.destroy');
});






