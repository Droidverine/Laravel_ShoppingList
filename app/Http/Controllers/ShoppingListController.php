<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoppinglist_Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
//Controller for ShoppingList
class ShoppingListController extends Controller
{

  public function displaylist()
  {
    $user = Auth::user();

    $shop= shoppinglist_Categories::all()->where('Created_by',$user->email);
    if(sizeof($shop)==0)
    {
      return view('shoppingListView',['shoppinglist'=>$shop,'status'=>"bad"]);

    }
    else{
    return view('shoppingListView',['shoppinglist'=>$shop, 'status'=>"good"]);
}
  }

  

//Add Category if not exists
  public function AddShoppingListCategory()
  {
    $user = Auth::user();
    $shop= shoppinglist_Categories::all()->where('Created_by',$user->email)->where('Category_Name',request("Category_Name"));
    $addCat= new shoppinglist_Categories();
    $addCat->Category_Name=request("Category_Name");
    $addCat->Created_by=$user->email;
    $addCat->status="Active";

    if(sizeof($shop)==0)
    {
      $addCat->save();
      return view('shoppingListView',['shoppinglist'=>$shop,'status'=>"Added"]);

    }
    else{
    return view('shoppingListView',['shoppinglist'=>$shop, 'status'=>"Aha Seems you already have this"]);
    }
  }

  //Add List Item if not exists
    public function AddShoppingListItem()
    {
    }
    public function logout1()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
