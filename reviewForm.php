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

	}
	input[type=submit] {
		width:240px;
		background-color:#031e79;
		cursor:pointer;
		padding: 10px, 12px;

	}
	input[type=submit]:hover {
  		background-color: #15349e;
	}
</style>
</header>
<body>

	<h1> Submit a Review </h1>
	<form id="reviewForm">
		<div>
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
			<textarea form="reviewForm" rows="4" cols="50" name="review" id="review">Enter Review Here.	
			</textarea>	
		</div>
		<br>
		<input type="submit"> 
	</form>
</body>
</html>
