<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorJournalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\AdminCategoryController;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SearchController;
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
//Route::get('search',SearchController::class)->name('search');
Route::get('/', [HomeController::class,'index'])->name('home');
//Route::get('/all-categories',[HomeController::class,'category'])->name('category');
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

Route::get('/all-categories',[CategoryController::class,'index'])->name('category');
Route::get('/category/{id}',[CategoryController::class,'show']);

//Search Route

Route::get('/search',SearchController::class);


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
    Route::get('/journals/{id}/edit',[AuthorJournalController::class,'edit']);
    Route::post('/journals/{id}',[AuthorJournalController::class,'update'])->name('journal.update');
    Route::delete('/journals/{id}',[AuthorJournalController::class,'destroy']);

    // category
    Route::get('/categories',[AdminCategoryController::class,'index'])->name('viewcategory');
    Route::get('/category/create',[AdminCategoryController::class,'create'])->name('createcategory');
    Route::get('/category/{id}',[AdminCategoryController::class,'show'])->name('singlecategory');
    Route::post('/category',[AdminCategoryController::class,'store']);
    Route::get('/category/{id}',[AdminCategoryController::class,'edit']);
    Route::post('/category/{id}',[AdminCategoryController::class,'update']);
    Route::delete('/delete/{id}',[AdminCategoryController::class,'destroy'])->name('delete.destroy');
});






