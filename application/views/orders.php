<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Style/main.css">
    <script type="text/javascript" src="../Materialize/jquery.min.js"></script>
    <script type="text/javascript" src="../Materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Materialize/css/materialize.css">
    <script type="text/javascript">
    $(document).ready(function() {
      $(document).on("change", "select", function() {
        var order = $(this).attr("name");
        var status = $(this).val();
        console.log(order);
        console.log(status);
        var new_status = {order, status};
        $.post("/Orders/update_status", new_status, function(res) {
          console.log(res);
          alert("Order status has been updated!");
        });
      });
    })


    </script>
    <style>
    * 
    {
      color: black;
    }
    a 
    {
      color: black;
    }
    .nav-wrapper, div .nav-wrapper li{
        padding-left: 10px ;
        background-color: #3D4956;
    }
    tbody tr:nth-child(odd) {
      background-color: rgba(225, 225, 225, 1);
    }
    select {
      display: inherit!important;
      width: 300px;
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
              <li><a href="/products/show_products">Add Products</a></li>
            </ul>
        </div>
    </nav>
</div>
<table>
  <thead>
    <th>Order ID</th>
    <th>Customer Name</th>
    <th>Order Date</th>
    <th>Shipping Address</th>
    <th>Total</th>
    <th>Status</th>
  </thead>
  <tbody>
<?php //list out all the products in a table 
// var_dump($orders);
// die();
  foreach($orders as $order)
  {
?>
    <tr>
      <td><?=$order['order_id']?></td>
      <td><?=$order['first_name']?></td>
      <td><?=$order['created_at']?></td>
      <td><?=$order['shipping_address_1']?></td>
      <td><?=$order['price']*$order['quantity']?></td>
      <td>
      <select name="<?=$order['order_id']?>">
        <option><?=$order['status']?></option>
        <option value="Order_process">Order in process</option>
        <option value="Cancelled">Cancelled</option>
        <option value="Shipped">Shipped</option>
        <option value="<?=$order['status']?>"><?=$order['status']?></option>
      </select>
      </td>
    </tr>
<?php
  }
?>
  </tbody>
</body>
</html>