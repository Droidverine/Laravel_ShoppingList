<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\shoppinglist_Categories;
use App\Models\shoppinglist_items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
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
    return view('shoppingListView',['shoppinglist'=>$shop,'user' =>$user->email,'status'=>"good"]);
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
      $shop= shoppinglist_Categories::all()->where('Created_by',$user->email);

      return view('shoppingListView',['shoppinglist'=>$shop,'status'=>"Added"]);

    }
    else{
      $shop= shoppinglist_Categories::all()->where('Created_by',$user->email);

    return view('shoppingListView',['shoppinglist'=>$shop, 'status'=>"Aha Seems you already have this"]);
    }
  }

  //Add List Item if not exists
    public function AddShoppingListItem()
    {
      $user = Auth::user();
      $shop= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"))->where('Item_name',request("Item_name"));


      if(sizeof($shop)==0)
       {
        $addshop= new shoppinglist_items();
        $addshop->Item_category=request("Item_category");
        $addshop->Item_createdby=$user->email;
        $addshop->Item_name=request("Item_name");;
        $addshop->Item_status="False";
        $addshop->save();
        //sleep for 3 seconds
        $allitems= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"));

        return view('shoppingListViewItems',['Item_category'=>request("Item_category"),'shoppinglistitems'=>$allitems,'status'=>"Added"]);

      }
      else{
        $allitems= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"));

      return view('shoppingListViewItems',['Item_category'=>request("Item_category"),'shoppinglistitems'=>$allitems, 'status'=>"Aha Seems you already have this"]);
      }
    }
    public function ViewShoppingListItem(Request $request)
    {
      $user = Auth::user();
      $itemc=$request->input('Item_category');
      $allitems= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"));
      $shop= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',$itemc);
      $addCat= new shoppinglist_Categories();
      return view('shoppingListViewItems',['Item_category'=>$itemc,'Item_createdby'=>$user->email,'shoppinglistitems'=>$allitems,'status'=>'Added']);
    }

    public function DeleteItem(Request $request)
    {
      $user = Auth::user();
      $itemc=$request->input('Item_category');
      $itemn=$request->input('Item_name');
      $allitems= shoppinglist_items::where('Item_name',$itemn)->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"))->delete();
      $shop= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',$itemc);
      return view('shoppingListViewItems',['Item_category'=>$itemc,'Item_createdby'=>$user->email,'shoppinglistitems'=>$shop,'status'=>'Added']);
    }

    public function MarkItem(Request $request)
    {
      $user = Auth::user();
      $itemc=$request->input('Item_category');
      $itemn=$request->input('Item_name');
      $allitems= shoppinglist_items::where('Item_name',$itemn)->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"))->update(['Item_status' => "True"]);
      $shop= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',$itemc);
      return view('shoppingListViewItems',['Item_category'=>$itemc,'Item_createdby'=>$user->email,'shoppinglistitems'=>$shop,'status'=>'Added']);
    }

    public function EditItem(Request $request)
    {
      //check if already exists pending
      $user = Auth::user();
      $itemc=$request->input('Item_category');
      $itemn=$request->input('Item_name');
      $newitemname=$request->input('New_Item_name');
      $allitems= shoppinglist_items::where('Item_name',$itemn)->where('Item_createdby',$user->email)->where('Item_category',request("Item_category"))->update(['Item_name' => $newitemname]);
      $shop= shoppinglist_items::all()->where('Item_createdby',$user->email)->where('Item_category',$itemc);
      return view('shoppingListViewItems',['Item_category'=>$itemc,'Item_createdby'=>$user->email,'shoppinglistitems'=>$shop,'status'=>'Added']);
    }

    public function DeleteCategory(Request $request)
    {
      //check if already exists pending
      $user = Auth::user();
      $itemc=$request->input('Item_category');
      $delcat= shoppinglist_items::where('Item_createdby',$user->email)->where('Item_category',request("Item_category"))->delete();
      $delitem= shoppinglist_Categories::where('Created_by',$user->email)->where('Category_Name',$itemc)->delete();
      $shop= shoppinglist_Categories::all()->where('Created_by',$user->email);

      return view('shoppingListView',['Item_category'=>$itemc,'Item_createdby'=>$user->email,'shoppinglist'=>$shop,'status'=>'Added']);
    }


    public function logout1()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
