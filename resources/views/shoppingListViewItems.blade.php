<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Shopping List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {
          width: 50%
          box-sizing: border-box;}

        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }

        input[type=submit] {
          background-color: #000000;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.8);

        }

        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          margin: auto;
          padding: 12px 20px;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.8);

          width: 75%;

        }
        li{
          display: inline-block;
          cursor: pointer;
        }
        </style>
        </head>
        <body>
          <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ShopWishlist</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

       <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout1"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <center>
          <div style="align:center;margin-left:5%;margin-right:5%;">
            <div>
            <h3>Add Item to list:</h3>
          <form  method="get" action="/AddShoppingListItems">
              @csrf
              <input type="hidden" name="Item_category" id="Item_category" value="{{$Item_category}}">
              <input type="text" name="Item_name" id="Item_name" placeholder="Enter Item name here" required>
              <input type="submit" >
            </form>
            </div>
          </center>

<center><h3>List of shoplists</h3> </center>
<ul>

 @foreach ($shoppinglistitems as $shop)
 <li class="list-group-item" location.href="'/EditItem?Item_name={{$shop->Item_name}}&Item_category={{$shop->Item_category}}'">
@if($shop->Item_status=="False")
  <input type="checkbox" onclick="MarkItem('{{$shop->Item_name}}','{{$shop->Item_category}}')" style="vertical-align: right" class="form-check-input" name="ev_uid" >
@elseif($shop->Item_status=="True")
<input type="checkbox" onclick="MarkItem('{{$shop->Item_name}}','{{$shop->Item_category}}')" style="vertical-align: right" class="form-check-input" name="ev_uid" checked>
@endif
  <a style="font-size:28px;">{{$shop->Item_name}}</a>    <button type="button" class="close" onclick="DeleteItem('{{$shop->Item_name}}','{{$shop->Item_category}}')">&times;</button>

<div align="right" >
  <br>
<a>Created on: {{$shop->created_at}}</b></div>
    <div align="center"> <button type="button"
  data-toggle="modal" data-target="#myModal">
  <span class="glyphicon glyphicon-pencil"></span> Edit
</button></div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <a style="font-size:28px;" class="d-inline-block" >Edit Item name</a>         <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
  <form method="get" action="/EditItem">
      <input type='text' name="New_Item_name" placeholder="{{$shop->Item_name}}" required><br>
      <input type='hidden' name="Item_name" value="{{$shop->Item_name}}">
      <input type='hidden' name="Item_category" value="{{$shop->Item_category}}">
      <input type='submit' value='submit'>


      </form>
</div>

    </div>

  </div>
</div>
  </li>
 @endforeach

</ul>
</div>
</div>
<script>
function MarkItem(Item_name,Item_category) {
  var txt;
  if (confirm("Do you really want to mark this!??")) {
    window.location.href="/MarkItem?Item_name="+ Item_name+ "&Item_category="+Item_category;
  } else {
    window.location.href="/MarkItem?Item_category="+ Item_category;

   }


}
function DeleteItem(Item_name,Item_category) {
  var txt;
  if (confirm("Do you really want to Delete "+Item_name+" ?")) {
  window.location.href="/DeleteItem?Item_name="+ Item_name+ "&Item_category="+Item_category;
  }





}
</script>
        </body>

</html>
