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
          <div style="align:center;">
<center><h3>List of shoplists</h3> </center>
<ul>

 @foreach ($shoppinglistitems as $shop)
 <li class="list-group-item" >
  <input type="checkbox" onclick="" style="vertical-align: right" class="form-check-input" name="ev_uid" > <a href="/EditTask?EditView">{{$Item_category}}
</a><div align="right"><a style="font-size: 60%">ss</a></div></font>
<div align="right" >
<a>Task Due:a></b></div>
    <div align="center">        <button type="button" class="btn btn-default btn-sm"
  onClick="location.href='/Task_Delete'">
    <span class="glyphicon glyphicon-remove"></span> Delete
  </button> <button type="button" class="btn btn-default btn-sm"
onClick="location.href='/Task_Delete'">
  <span class="glyphicon glyphicon-edit"></span> Edit
</button></div>

  </li>
 @endforeach

</ul>
</div>
<center>
<h3>Add Task</h3>
</center>
<center><form method="get" action="/AddShoppingListItems">
  @csrf
  <input type="hidden" name="Item_category" id="Item_category" value="{{$Item_category}}">
  <input type="text" name="Item_name" id="Item_name" placeholder="Enter Item name here">
  <input type="submit" >
</form>
</center>
</div>
<script>
function myFunction(tkuid,tkboardname) {
  var txt;
  if (confirm("Do you really want to mark this!??")) {
  //window.location="/EditTask?EditStatus=True&Item_name="+tkuid+"&Item_category="+tkboardname";
  } else {
   }


}
function DeleteTaskboard(tkuid) {
  var txt;
  if (confirm("Do you really want to Delete this Item?")) {
  //window.location="/ShopItem_Delete?Item_name=itemname&Item_category=Item_category";
  }


}
</script>
        </body>

</html>
