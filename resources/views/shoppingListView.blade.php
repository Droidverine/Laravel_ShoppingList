<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopping List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <body>

          <div style="align:center;">
List should be here
<ul>

 @foreach ($shoppinglist as $shop)
 <li>
  {{$shop->Category_Name}}
  </li>
 @endforeach

</ul>
</div>

<form method="get" action="/AddCategory">
  @csrf
  <input type="hidden" name="Created_by" id="Created_by" value="shivrajblogger@gmail.com">
  <input type="text" name="Category_Name" id="Category_Name">
  <input type="submit" value="submit">
</form>
        </body>

</html>
