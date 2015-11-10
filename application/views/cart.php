<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="/materialize/jquery.min.js"></script>
    <script type="text/javascript" src="/Materialize/js/materialize.min.js"></script> 
    <script type="text/javascript" src="/dist/js/lightslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Materialize/css/materialize.css">     
    <link rel="stylesheet" type="text/css" href="/dist/css/lightslider.css"/>   
    <style type="text/css">
      .nav-wrapper, div .nav-wrapper li{
        padding-left: 10px ;
        background-color: #3D4956;
    }
    
    
    #content{
        background-color: #FFFFFF;
        border: none;
    }
    .active-cat, .pagination li.active{
        background-color: #B1B6BB;
    }
    #info {
      width: 700px;
      display: block;
      margin: 5% auto;
    }
    tbody tr:nth-child(odd) {
      background-color: rgba(225, 225, 225, 1);
    }
    button {
      display: block!important;
      margin: 10px auto;

    }
/*    input[type=checkbox] {
      visibility: visible!important;
      position: inherit!important;
    }*/
    </style>
<script>
$(document).ready(function()
{
  $("#same_as_billing").on("change", function()
  {
    if (this.checked) 
    {
      $("[name='shipping_first_name']").val($("[name='first_name']").val());
      $("[name='shipping_last_name']").val($("[name='last_name']").val());
      $("[name='shipping_email']").val($("[name='email']").val());
      $("[name='shipping_address_1']").val($("[name='billing_address_1']").val());
      $("[name='shipping_address_2']").val($("[name='billing_address_2']").val());
      $("[name='shipping_city']").val($("[name='billing_city']").val());
      $("[name='shipping_state']").val($("[name='billing_state']").val());
      $("[name='shipping_zip']").val($("[name='billing_zip']").val());
      $("[name='shipping_country']").val($("[name='billing_country']").val());
      $(".shipping").hide("slow");
    }
    else 
    {
      $(".shipping").show("slow");
    }   
  });
  $("#info").submit(function() {
    $.post("/Orders/update_order", $(this).serialize(), function(stat) {
      console.log(stat);
      alert(stat);
      $("#info").fadeOut("slow");
      $("#stripe").fadeIn("slow");
    }, "json");
    return false;
  });
  
})
</script>
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="/displays/go_to_shop" class="brand-logo">Magrathea</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="#">Shopping Cart (<?= $this->session->userdata("quantity"); ?>)</a></li>
              <li><a href="/admins">Admin Portal</a></li>
            </ul>
        </div>
    </nav>
</div>
<?php 
 $total = 0;
if (isset($order)) {
  ?>
<table>
  <thead>
    <th>Item</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Modify</th>
    <th>Total</th>
  </thead>
  <tbody>
<?php
  foreach($order as $info)
  {
?>
    <tr>
      <td><?= $info['name']?></td>
      <td><?= $info['price']?></td>
      <td class="update_cont<?=$info['product_id']?>"><?= $info['quantity']?></td>
      <td ><a class="update<?=$info['product_id']?> btn" href="#">update</a><a class="btn" href=
      <?php echo "/Carts/delete/".$info['product_id']."/".$info['quantity'];?>
      >delete</a></td>
      <td><?php echo $item_total = $info['quantity']*$info['price']?></td>
      <script type="text/javascript">
        $(document).on('click', ".update<?=$info['product_id']?>", function(){
          $(this).hide();
          $(".update_cont<?=$info['product_id']?>").html("<form id='update_quan' action='/carts/update' method='post'><input type='number' name='new_quantity' value='" + "<?=$info['quantity']?>'>" + "<input type='hidden' name='product_id' value='" + "<?=$info['product_id']?>'>" + "<input type='submit' value='update'></form>");
        })
      </script>
    </tr>
<?php
  $total += $item_total;
 }
} else {
  ?>
  <h2>You haven't ordered anything yet!</h2>
  <?php
}
?>
  </tbody>
  <h4>Total: <?php echo $total; ?></h4>
<a class="btn" href="/displays/go_to_shop">Continue Shopping</a>
</table>
<form id="info" action="/orders/update_order" method="post">
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
  <input type="checkbox" value="Same as billing" id="same_as_billing">
  <label for="same_as_billing">Same as billing</label>
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
  </fieldset>
  <input type="submit" class="btn" value="Submit">
</form>
  <form id="stripe" action="" method="POST" hidden>
    <script
      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
      data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
      data-amount="2000"
      data-name="Demo Site"
      data-description="2 widgets ($20.00)"
      data-image="/128x128.png"
      data-locale="auto">
    </script>
  </form>
   
</body>
</html>