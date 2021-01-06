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
        <li class="active"><a href="/NavBar?request=Home">Home</a></li>

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

 @foreach ($shoppinglist as $shop)
 <li class="list-group-item" onclick="location.href='/?asd=asd'" >
  {{$shop->Category_Name}}
  </li>
 @endforeach

</ul>
</div>
<center><form method="get" action="/AddCategory">
  @csrf
  <input type="hidden" name="Created_by" id="Created_by" value="shivrajblogger@gmail.com">
  <input type="text" name="Category_Name" id="Category_Name" placeholder="Enter Shop list category here">
  <input type="submit" value="submit">
</form>
</center>
</div>
        </body>

</html>
