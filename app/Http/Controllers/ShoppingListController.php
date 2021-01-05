<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingListController extends Controller
{

  public function displaylist()
  {
    return view('shoppingListView');
  }
    //
}
