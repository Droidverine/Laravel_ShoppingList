<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//View shopping categories list
Route::get('/home', [App\Http\Controllers\ShoppingListController::class, 'displaylist'])->middleware('auth');

//View shopping categories list
Route::get('/ShoppingList', [App\Http\Controllers\ShoppingListController::class, 'displaylist'])->middleware('auth');

//View shopping list items of particular category
Route::get('/ShoppingListItems', [App\Http\Controllers\ShoppingListController::class, 'ViewShoppingListItem'])->middleware('auth');

//Add shopping list items to particular category
Route::get('/AddShoppingListItems', [App\Http\Controllers\ShoppingListController::class, 'AddShoppingListItem'])->middleware('auth');

//Delete shopping list item of particular category
Route::get('/DeleteItem', [App\Http\Controllers\ShoppingListController::class, 'DeleteItem'])->middleware('auth');

//Mark shopping list item fulfilled of particular category
Route::get('/MarkItem', [App\Http\Controllers\ShoppingListController::class, 'MarkItem'])->middleware('auth');

//Edit shopping list item fulfilled of particular category
Route::get('/EditItem', [App\Http\Controllers\ShoppingListController::class, 'EditItem'])->middleware('auth');

//Delete shopping list item
Route::get('/DeleteCategory', [App\Http\Controllers\ShoppingListController::class, 'DeleteCategory'])->middleware('auth');

//Logout
Route::get('/logout1', [App\Http\Controllers\ShoppingListController::class, 'logout1'])->middleware('auth');

//Add shopping category
Route::get('/AddCategory', [App\Http\Controllers\ShoppingListController::class, 'AddShoppingListCategory'])->middleware('auth');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
