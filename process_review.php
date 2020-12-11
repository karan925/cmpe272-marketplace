<!DOCTYPE html>
<html>
<header>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<div class="topnav">
	<a href="./home.php">Home</a>
	<a href="./companies_link.php">Marketplace Members</a>
	<a class = "active" href="./reviews.php">Add a Review</a>
	<a href="./marketplace_popular.php">Most Popular Products</a>
	<a href="./visit_history.php">My History</a>
	<a href="./authenticate.php">Log In/Sign Up</a>
	<a href="./logout.php">Log Out</a>
	</div>
</header>
<body>
<?php
extract($_GET);
echo 'ratings: '.$ratings.'<br>';
echo 'review: <br>'.$review.'<br>';
echo 'product name: '.$product_name.'<br>';

$insert_sql = "INSERT INTO heroku_8c6c26a69cb9c50.reviews(name, item, content)";

?>