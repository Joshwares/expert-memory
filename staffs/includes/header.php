<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="includes/css/header.css">
    <!--link rel="stylesheet" type="text/css" href="css/index.css"-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-glyphicons.css"> 
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <style type="text/css">

    	body{
    		font-family: "times new roman";
    		margin: 0;
    		padding: 0;
    		margin-top: 10vh;
    	}
		nav a{
			font-size: 15px;
		}
		a{
			transition: 0.5s;
		}
		button{
			transition: 0.5s;
		}
		.error{
			color: #ff0000;
			font-size: 15px;
		}
	</style>
</head>
<body style="">

	<!-- PAGES NAVIGATION HEADER -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar-col">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../index.php">Political Party Management System</a>
			</div>
			<div class="collapse navbar-collapse" id="Navbar-col">
				<!--ul class="nav navbar-nav">
					<li><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
				</ul-->
				<ul class="nav navbar-nav navbar-right">
					<li class=""><a href="../index.php"><span class="glyphicon glyphicon-home"></span>&nbsp; HOME</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; CONTACT</a></li>
				</ul>
			</div>
		</div>
	</nav>
<!--?php
	session_start();// START SESSION

	//MAKING A CONDITION THAT IF USER HASN'T LOGIN WITH EMAIL, THE SYSTEM WILL REJET THE USER!
	if (isset($_SESSION["cmpEmail"])) {
		header("location:dashboard.php");
	}
?-->