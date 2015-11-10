<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="/Materialize/jquery.min.js"></script>     
    <script type="text/javascript" src="/Materialize/js/materialize.min.js"></script> 
    <script type="text/javascript" src="/dist/js/lightslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Materialize/css/materialize.css">     
    <link rel="stylesheet" type="text/css" href="/dist/css/lightslider.css"/>   

    <style type="text/css">
    * {
    color: black;
    }
    a 
    {
      color: black;
    }
    #wrapper{
      padding: 10px 20px;
    }
    .nav-wrapper, div .nav-wrapper li{
        padding-left: 10px ;
        background-color: #3D4956;
    }
    select {
      display: inherit!important;
      width: 300px;
    }
    #new_product {
      width: 50%;
      display: block;
      margin: 0 auto;
    }

    </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Magrathea</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="/admins/logout">Logout</a></li>
              <li><a href="/carts/show_orders">Process Orders</a></li>
            </ul>
        </div>
    </nav>
</div>
<div id="wrapper">
<table>
  <thead>
    <th>Item</th>
    <th>Price</th>
    <th>Description</th>
    <th>Planet Type</th>
    <th>Inventory Count</th>
    <th>Action</th>
  </thead>
  <tbody>
<?php //list out all the products in a table 
  foreach($products as $product)
  {
?>
    <tr>
      <td><a href="/planets/show_planet/<?=$product['id']?>/<?=$product['type_id']?>"><?=$product['name']?></a></td>
      <td><?=$product['price']?></td>
      <td><?=$product['description']?></td>
      <td><?=$product['type_name']?></td>
      <td><?=$product['inventory']?></td>
      <td><p><a class="btn" href="/products/edit_product/<?=$product['id']?>">update</a></p>
          <p><a class="btn" href="/products/delete_product/<?=$product['id']?>">delete</a></p>
      </td>
    </tr>
<?php
  }
?>
  </tbody>
</table>


<form id="new_product" action="/products/product_entry" method="post">
  <fieldset class="product">
    <h5><legend>Product Information</legend></h5>
    <input type="text" name="name" placeholder="Name:" />
    <select name="type_id" id="planet_type">
      <option value="1">Dwarf</option>
      <option value="2">Habitable</option>
      <option value="3">Gas Giant</option>
      <option value="4">Rocky</option>
      <option value="5">Doubtful exsitence</option>
      <option value="6">Star</option>
      <option value="7">Far far away</option>
    </select>
    <input type="text" name="description" placeholder="Description:" />
    <input type="text" name="price" placeholder="Price:" />
    <input type="text" name="inventory" placeholder="Inventory Count:" />
    <input type="submit" value="add">
  </fieldset>
</form>
</div>
</body>
</html>