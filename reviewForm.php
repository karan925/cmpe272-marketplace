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
<style>
	input[type=radio] {
		margin-left:24px;
		padding: 5px;
	}
	textarea{
		margin-left: 24px;
	}
	input[type=submit] {
		width:240px;
		background-color:#031e79;
		cursor:pointer;
		padding: 10px, 12px;
		color:white;
		margin-left:24px;
	}
	input[type=submit]:hover {
  		background-color: #15349e;
	}
	form {
  	border-radius: 5px;
  	background-color: #f2f2f2;
  	padding: 20px;

	}
	label{
		margin-left:24px;
	}
</style>
</header>
<body>

	<h1> Submit a Review </h1>
<?php  
	/**
	* Retrieve product from reviews.php file 
	* product_info[0] = company name
	* product_info[1] = product name
	*/
	$product_info = $_GET['prod'];
	$product_info = unserialize(base64_decode($product_info));
?>
	<form id="reviewForm" action="process_review.php" method="get"> <!-- id="reviewForm" -->
		<div>
			<?php
			echo '<h3>'.$product_info[0].'</h3>';	
			echo '<h4>Product: '.$product_info[1].'</h4>';
			?>
			<label for="ratings"><Strong>Please Choose a Rating</Strong></label>
			<br>
			<input type="radio" name="ratings" id="one" value="one">
			<label for="one">One</label>
			<input type="radio" name="ratings" id="two" value="two">
			<label for="two">Two</label>
			<input type="radio" name="ratings" id="three" value="three">
			<label for="three">Three</label>
			<input type="radio" name="ratings" id="four" value="four">
			<label for="four">Four</label>
			<input type="radio" name="ratings" id="five" value="five">
			<label for="five">Five</label>
		</div>
		<div>
			<br>
			<label for="review"><Strong>Please Submit a Review</Strong></label>
			<br>
			<textarea form="reviewForm" rows="4" cols="50" name="review" id="review">	
			</textarea>	
		</div>
		<input type='hidden' id='product_name' name='product_name' value="" />
		<script>
		window.onload = function() {document.getElementById('product_name').value = $product_info[1];};
		</script>
		<br>
		<input type="submit"> 
	</form>
</body>
</html>
