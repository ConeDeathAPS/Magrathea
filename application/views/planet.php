<!DOCTYPE html> 
<html lang="en"> <head>     
<meta charset="UTF-8">     
<meta
http-equiv="X-UA-Compatible" content="IE=edge">     
<meta name="description" content="">     
<title>Document</title>     
<script type="text/javascript" src="/Materialize/jquery.min.js"></script>     
<script type="text/javascript" src="/Materialize/js/materialize.min.js"></script> 
<script type="text/javascript" src="/dist/js/lightslider.min.js"></script>
<link rel="stylesheet" type="text/css" href="/Materialize/css/materialize.css">     
<link rel="stylesheet" type="text/css" href="/dist/css/lightslider.css"/>     
<style>       
    ul{
    list-style: none outside none;         padding-left: 0;         margin: 0;
    }

    .content-slider li{
        border: 1px solid black;
        text-align: center;
        color: #FFF;
        padding: 70px 0px;
        background-color: black;
    }
    .content-slider h3 {
        margin: 0;  
    }
    .demo{
      width: 80%;
    }
    #description{
    display: inline-block;
    padding: 0px 10px;
    width: 50%;
    vertical-align: top;
    }
    form, input{
        display: inline-block;
    }
    #quantity{
        border: 1px solid black;
        width: 50px;
        margin-right: 25px;
    }

    </style>
    <script>
       $(document).ready(function() {


      $("#content-slider").lightSlider({
                loop:false,
                keyPress:true,
                autoWidth: true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
        $("li a").each( function() {
             this.href = this.href.replace(/\s/g,"%20");
            });
    });
    </script>
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

/*   li.lslide.active{
        min-width: 474px;
        max-width: 474px;
    }*/
    #content-slider li {
        margin-right: 5px!important;
        width: 190px;
    }
    #content-slider {
        display: block;
    }
    #wrapper {
        padding: 15px;
    }
    img {
        width: 474px;
        height: 338px;
    }



    </style>
</head>
<body>
<nav>
 <div class="nav-wrapper">
     <a href="/displays/go_to_shop" class="brand-logo">Magrathea</a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a href="/">Shopping Cart (<?= $this->session->userdata("quantity"); ?>)</a></li>
     </ul>
   </div>
 </nav>  
 <div id="wrapper">
 <a href="/displays/go_to_shop">Go Back</a>
 <h3><?php echo $planet['name'] ?></h3>            
            <div class="clearfix" style="max-width:474px; display: inline-block;">
                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                    
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>1.jpg"?> 
                        <img src="/img/<?=$planet['name']?>1.jpg"?>
                         </li>
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>2.jpg"?> 
                        <img src="/img/<?=$planet['name']?>2.jpg"?>
                         </li>
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>3.jpg"?> 
                        <img src="/img/<?=$planet['name']?>3.jpg"?>
                         </li>
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>4.jpg"?> 
                        <img src="/img/<?=$planet['name']?>4.jpg"?>
                         </li>
                   <li data-thumb="/img/thumbs/<?=$planet['name']?>5.jpg"?> 
                        <img src="/img/<?=$planet['name']?>5.jpg"?>
                         </li>
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>6.jpg"?> 
                        <img src="/img/<?=$planet['name']?>6.jpg"?>
                         </li>
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>7.jpg"?> 
                        <img src="/img/<?=$planet['name']?>7.jpg"?>
                         </li>
                   <li data-thumb="/img/thumbs/<?=$planet['name']?>8.jpg"?> 
                        <img src="/img/<?=$planet['name']?>8.jpg"?>
                         </li>
                    <li data-thumb="/img/thumbs/<?=$planet['name']?>9.jpg"?> 
                        <img src="/img/<?=$planet['name']?>9.jpg"?>
                         </li>
                </ul>
            </div><!--ends clearfix-->
        <div id="description">
        <p><?php echo $planet['description']?></p>
        <p>Price: $<?php echo $planet['price']?><p>        
        <form action="/planets/add" method="post"> 
            Quantity: <input id="quantity" type="text" name="quantity" value "quantity" placeholder='1'>
            <input type="hidden" value="<?= $planet['id']; ?>" name="product_id">
            <input id="add" type="submit" value="Add to cart">
        </form>
        </div><!--ends description-->
        
        <h5>Similiar Products</p>
        <div id="similar_planets">
            <ul id="content-slider" class="content-slider">
            <?php
            if (isset($similars)) {
                foreach ($similars as $key => $value) {
                    ?>
                <li style="background-image: url('/img/<?= $value['name']?>1.jpg'); background-size: cover; background-position: center;">
                    <h3>
                    <a href="/planets/show_planet/<?= $value['id']; ?>/<?= $planet['type_id']; ?>">
                    <?php echo $value['name']; ?>
                    </a>
                    </h3>
                </li>
                <?php
                }
            }
            ?>
            </ul>
<!--                 <li>
                    <h3>2</h3>
                </li>
                <li>
                    <h3>3</h3>
                </li>
                <li>
                    <h3>4</h3>
                </li>
                <li>
                    <h3>5</h3>
                </li>
                <li>
                    <h3>6</h3>
                </li> -->
            <!-- </ul> -->
        </div><!--similar products-->
    </div> 
 </div>   
</body>
