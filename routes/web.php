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

Route::get('/home', [App\Http\Controllers\ShoppingListController::class, 'displaylist'])->middleware('auth');

//View shopping categories list
Route::get('/ShoppingList', [App\Http\Controllers\ShoppingListController::class, 'displaylist'])->middleware('auth');

Route::get('/ShoppingListItems', [App\Http\Controllers\ShoppingListController::class, 'ViewShoppingListItem'])->middleware('auth');
Route::get('/AddShoppingListItems', [App\Http\Controllers\ShoppingListController::class, 'AddShoppingListItem'])->middleware('auth');
Route::get('/DeleteItem', [App\Http\Controllers\ShoppingListController::class, 'DeleteItem'])->middleware('auth');
Route::get('/MarkItem', [App\Http\Controllers\ShoppingListController::class, 'MarkItem'])->middleware('auth');
Route::get('/EditItem', [App\Http\Controllers\ShoppingListController::class, 'EditItem'])->middleware('auth');

Route::get('/DeleteCategory', [App\Http\Controllers\ShoppingListController::class, 'DeleteCategory'])->middleware('auth');

//DeleteCategory
Route::get('/logout1', [App\Http\Controllers\ShoppingListController::class, 'logout1'])->middleware('auth');

//Add shopping category
Route::get('/AddCategory', [App\Http\Controllers\ShoppingListController::class, 'AddShoppingListCategory'])->middleware('auth');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
