<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Style/main.css">
    <script type="text/javascript" src="../Materialize/jquery.min.js"></script>
    <script type="text/javascript" src="../Materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Materialize/css/materialize.css">
    <style>
    * 
    {
      color: black;
    }
    a 
    {
      color: black;
    }
    </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Magrathea</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="sass.html">Shopping Cart (//===//)</a></li>
              <li><a href="carts/show_data_entry">Add Orders and Products</a></li>
            </ul>
        </div>
    </nav>
</div>
<form action="/carts/order_entry" method="post">
  <fieldset class="billing">
    <h5><legend>Billing Information</legend><h5>
    <input type="text" name="first_name" placeholder="First Name:" />
    <input type="text" name="last_name" placeholder="Last Name:" />
    <input type="text" name="email" placeholder="Email:" />
    <input type="text" name="billing_address_1" placeholder="Address:" />
    <input type="text" name="billing_address_2" placeholder="Address Line 2:" />
    <input type="text" name="billing_city" placeholder="City:" />
    <input type="text" name="billing_state" placeholder="State:" />
    <input type="text" name="billing_zip" placeholder="Zipcode:" />
  </fieldset>

  <fieldset class="shipping">
    <h5><legend>Shipping Information</legend><h5>
    <input type="text" name="shipping_first_name" placeholder="First Name:" />
    <input type="text" name="shipping_last_name" placeholder="Last Name:" />
    <input type="text" name="shipping_email" placeholder="Email:" />
    <input type="text" name="shipping_address_1" placeholder="Address:" />
    <input type="text" name="shipping_address_2" placeholder="Address Line 2:" />
    <input type="text" name="shipping_city" placeholder="City:" />
    <input type="text" name="shipping_state" placeholder="State:" />
    <input type="text" name="shipping_zip" placeholder="Zipcode:" />
    <input type="submit" value="add">
  </fieldset>
</form>


<form action="/carts/product_entry" method="post">
  <fieldset class="product">
    <h5><legend>Product Information</legend><h5>
    <input type="text" name="name" placeholder="Name:" />
    <select name="type_id" id="planet_type">
      <option value="1">Drawf</option>
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
</body>
</html>