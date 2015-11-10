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
        select {
      display: inherit!important;
      width: 300px;
    }
    input, select, #cancel {
        margin: 10px;
    }
    #wrapper {
        padding: 15px;
    }
    </style>
</head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Magrathea</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="/products/show_products">Add Products</a></li>
            </ul>
        </div>
    </nav>
</div>
<div id="wrapper">
    <h1>Edit Product - <?=$product['id']?></h1>
    <div class="input-field col s12">
        <form action="/products/update_product" method="post">
            <input type="hidden" name="id" value="<?=$product['id']?>">
            <input type="text" name="name" value="<?=$product['name']?>">
            <input type="text" name="description" value="<?=$product['description']?>">
            <div class="input-field col s12">
                <select name="type_id" value="<?=$product['type_name']?>">
<?php
                    foreach($types as $type)
                    {
?>
                        <option value="<?=$type['id']?>"><?=$type['type_name']?></option>
<?php
                    }
?>
                </select>
            </div>
            <input type="submit" class="btn" value="update">
        </form>
    </div>

        <a class="btn" id="cancel" href="/products/show_products">Cancel</a>
        <?php if(!empty($error)){ echo $error;}?> <!-- Error Message will show up here -->
        <?= form_open_multipart('/uploads/do_upload');?>
        <?php echo "<input type='file' name='userfile'/>";
              echo "<input class='btn' type='submit' name='submit' value='upload' /> ";
              echo "</form>"
        ?>
</div>