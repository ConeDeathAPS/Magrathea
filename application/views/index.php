<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/Style/index_style.css">
	<script type="text/javascript" src="/Materialize/jquery.min.js"></script>
	<script type="text/javascript" src="/Materialize/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Materialize/css/materialize.css">
	<script type="text/javascript">
	//initial loading .get. Offset set to 0 to get first 25 products.
	$(document).ready(function() {
		var offset = 0;
		$.get("/Display/get_products_by_page/" + offset, function(prod_data) {
			// console.log(prod_data);
			$(".container").html(prod_data);
		}, "html");
		$("#content").fadeIn("slow");
		//search auto update
		$("#search").keyup(function() {
				// alert("got here");
				var str = $(this).val();
				console.log(str);
				if (str == "") {
					$.get("/Display/get_products_by_page/0", function(prod_data) {
						// console.log(prod_data);
						$(".container").html(prod_data);
					}, "html");
					$("#content").fadeIn("slow");
					return false;
				}
				$.get("/Display/search/" + str, function(prod_data) {
					$(".container").html(prod_data);
				}, "html");
				$("#content").fadeIn("slow");
		});
	//when user clicks on page number, get offset by checking what number they clicked
	$(document).on("click", ".pages", function() {
		$(".active").removeClass("active");
		$(this).parent().addClass("active");
		var offset = $(this).attr("id") * 16;
		$(".container").fadeOut("fast");
		$.get("/Display/get_products_by_page/" + offset, function(prod_data) {
			$(".container").html(prod_data);
		}, "html");
		$(".container").fadeIn("fast");
	});
	//when user clicks on a category, change active class and get data from db
	$(document).on("click", ".type", function() {
		$(".active-cat").removeClass("active-cat");
		$(this).parent().addClass("active-cat");
		var id = $(this).attr("id");
		var category = $(this).attr("name");
		console.log(category);
		//if user clicked all products, get all the products just like at the beginning.
		if (id == "any") {
			var offset = 0;
			$.get("/Display/get_products_by_page/" + offset, function(prod_data) {
				// console.log(prod_data);
				$("#content > h1").html(category);
				$(".container").html(prod_data);
			}, "html");
			$("#content").fadeIn("slow");
		//otherwise, specify the type in the query
		} else {
			$.get("/Display/sort_by_category/" + id, function(prod_data) {
				console.log(prod_data);
				$("#content > h1").html(category);
				$(".container").html(prod_data);
			}, "html");	
			$("#content").fadeIn("slow");
		}
	});
	//When user select a sorting option, enable it
	$(document).on("click", ".sort", function() {
		var sort = $(this).attr("id");
		$.get("/Display/sort_products/" + sort, function(sorted_products) {
			// console.log("got into the get");
			$(".container").html(sorted_products);
		}, "html");
		$("#content").fadeIn("slow");
	});
})
	</script>
	<style type="text/css">
		div .nav-wrapper, div .nav-wrapper li{
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
	</style>
</head>
<body>
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">Magrathea</a>
		    <ul id="nav-mobile" class="right hide-on-med-and-down">
		      <li><a href="/carts/show_cart">Shopping Cart (<?= $this->session->userdata("quantity"); ?>)</a></li>
              <li><a href="/admins">Admin Portal</a></li>
		    </ul>
		</div>
	</nav>
</div>
<div id= 'wrapper'>
<ul id="slide-out" class="side-nav fixed">
<!--first link is the search form and input. jQuery will submit the form every time a key is pressed.-->
	<li><label for="search">Search:</label><input id="search" type="text" name="search"></li>
    <li class="active-cat"><a class="type" id="any" name="All Products" href="#!">All Products</a></li>
    <li><a class="type" id="1" name="Dwarf Planets" href="#">Dwarf Planets</a></li>
    <li><a class="type" id="2" name="Habitable Planets"  href="#">Habitable Planets</a></li>
    <li><a class="type" id="3" name="Gas Giants"  href="#">Gas Giants</a></li>
    <li><a class="type" id="4" name="Solid Planets"  href="#">Solid Planets</a></li>
    <li><a class="type" id="5" name="Doubtful Existence"  href="#">Doubtful Existence</a></li>
    <li><a class="type" id="6" name="Stars"  href="#">Stars</a></li>
    <li><a class="type" id="7" name="Far, far away"  href="#">Far, far away</a></li>
</ul>

<div id="content" hidden>
	<h1>All Products</h1>
	<a class='dropdown-button btn' href='#' data-activates='sort'>Sort by:</a>
	<ul id='sort' class='dropdown-content'>
	    <li><a class="sort" id="A" href="#">Price: Low -> High</a></li>
	    <li><a class="sort" id="D" href="#">Price: High -> Low</a></li>
	</ul>
	<ul class="pagination">
	    <li class="active waves-effect"><a id="0" class="pages" href="#!">1</a></li>
	    <li>|</li>
	    <li class="waves-effect"><a id="1" class="pages" href="#!">2</a></li>
	    <li>|</li>
	    <li class="waves-effect"><a id="2" class="pages" href="#!">3</a></li>
	    <li>|</li>
	    <li class="waves-effect"><a id="3" class="pages" href="#!">4</a></li>
	    <li>|</li>
	    <li class="waves-effect"><a id="4" class="pages" href="#!">5</a></li>
	</ul>

	<div class="container">

	</div>
</div>
</div><!--ends wrapper-->
</body>
</html>