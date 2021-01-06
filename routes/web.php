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

Route::get('/home', function () {
    return view('welcome');
});

//View shopping categories list
Route::get('/ShoppingList', [App\Http\Controllers\ShoppingListController::class, 'displaylist'])->middleware('auth');

Route::get('/logout1', [App\Http\Controllers\ShoppingListController::class, 'logout1'])->middleware('auth');

//Add shopping category
Route::get('/AddCategory', [App\Http\Controllers\ShoppingListController::class, 'AddShoppingListCategory'])->middleware('auth');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
