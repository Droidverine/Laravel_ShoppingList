<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\shoppinglist_Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();

      $shop= shoppinglist_Categories::all()->where('Created_by',$user->email);
      if(sizeof($shop)==0)
      {
        return view('shoppingListView',['user' =>$user->email,'shoppinglist'=>$shop,'status'=>"bad"]);

      }
      else{
      return view('shoppingListView',['user' =>$user->email,'shoppinglist'=>$shop, 'status'=>"good"]);    }

}

}
