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
    div {
        width: 50%;
        padding: 15px;
        margin: 0 auto;
    }
    </style>
</head>
<body>

<?= $this->session->flashdata("errors");?>
<div>
	<h3>Admin Login</h3>
	<form action="/admins/enter" method="post">
		Email:<input type="text" name="email">
		Password:<input type="password" name="password">
		<input type="submit" value="Login">
	</form>
</div>
</body>
</html>