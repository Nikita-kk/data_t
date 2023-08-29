<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
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

// for Datatable
Route::get('form',[FormController::class,'form'])->name('form');
Route::get('form/list', [FormController::class, 'getform'])->name('form.list');
Route::get('edit/{id}',[FormController::class,'edit'])->name('edit');
Route::get('delete/{id}',[FormController::class,'delete'])->name('delete');
Route::post('update/{id}',[FormController::class,'update'])->name('update');


// for blog
Route::get('blog/form',[BlogController::class,'form'])->name('blog.form');
Route::post('blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('blog/table',[BlogController::class,'table'])->name('blog.table');
Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::get('blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');

// for blog datatable

Route::get('blog/table/list',[BlogController::class,'gettable'])->name('blog.table.list');



// for category
Route::get('category/form',[CategoryController::class,'form'])->name('category.form');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/table',[CategoryController::class,'table'])->name('category.table');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

