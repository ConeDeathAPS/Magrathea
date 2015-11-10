<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete!</title>
</head>
<body>
	<h2>Are you sure you want to delete <?=$product['name']?>?</h2>
	<a href="/products/confirm_delete/<?=$product['id']?>"><button>Yes I am sure.</button></a>
	<a href="/products/show_products"><button>Cancel</button></a>
</body>
</html>