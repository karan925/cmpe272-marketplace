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
	// echo 'ratings: '.$ratings.'<br>';
	// echo 'review: <br>'.$review.'<br>';
	// echo 'product name: '.$product_name.'<br>';
	$conn = new mysqli("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
	mysqli_select_db($conn, "heroku_8c6c26a69cb9c50");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$select_username = "SELECT username from heroku_8c6c26a69cb9c50.session_status WHERE status='session';";
	if ( !( $result = mysqli_query($conn, $select_username))) {
		print("Could not execute query! <br />");
		echo mysqli_error($conn)."<br>";
		die();
	}

	foreach ($result as $x) {
		$Username = $x['username'];
	}

	$select_review_sql = "SELECT id FROM heroku_8c6c26a69cb9c50.reviews WHERE name=? and item=?";
	$stmt = $conn->prepare($select_review_sql);
	$stmt->bind_param("ss", $Username, $product_name);
	$stmt->execute();
	while($stmt->fetch()) {
		print("You have already submitted a review of this item. <br />");
		die();
	}
	$stmt->close();

	$insert_review_sql = "INSERT INTO heroku_8c6c26a69cb9c50.reviews(name, item, content) VALUES (?, ?, ?);";
	$stmt = $conn->prepare($insert_review_sql);
	$stmt->bind_param("sss", $Username, $product_name, $review);
	$stmt->execute();
	$stmt->close();

	$select_rating_sql = "SELECT id, numvotes, score FROM heroku_8c6c26a69cb9c50.rating WHERE item=?";
	$stmt = $conn->prepare($select_rating_sql);
	$stmt->bind_param("s", $product_name);
	$stmt->execute();
	$stmt->bind_result($id_r, $numvotes_r, $current_score_r);
	$id = 0;
	$numvotes = 0;
	$current_score = 0.0;
	while($stmt->fetch()) {
		$id = $id_r;
		$numvotes = $numvotes_r;
		$current_score = $current_score_r;
	}
	$stmt->close();

	$assigned_rating = 0.0;
	if ($ratings == "one")
		$assigned_rating = 1.0;
	if ($ratings == "two")
		$assigned_rating = 2.0;
	if ($ratings == "three")
		$assigned_rating = 3.0;
	if ($ratings == "four")
		$assigned_rating = 4.0;
	if ($ratings == "five")
		$assigned_rating = 5.0;

	if ($id == 0) {
		$insert_rating_sql = "INSERT INTO heroku_8c6c26a69cb9c50.reviews(item, siteholder, numvotes, score) VALUES (?, ?, ?, ?);";
		$stmt = $conn->prepare($insert_rating_sql);
		$stmt->bind_param("ssid", $product_name, $company_name, 1, $assigned_rating);
		$stmt->execute();
		$stmt->close();
	}
	else {
		$update_rating_sql = "UPDATE heroku_8c6c26a69cb9c50.reviews set numvotes = ?, score = ? where item = ?;";
		$stmt = $conn->prepare($update_rating_sql);
		$numvotes = $numvotes + 1;
		$new_score = (($current_score * ($numvotes-1)) + $assigned_rating) / $numvotes;
		$stmt->bind_param("ids", $numvotes, $new_score, $product_name);
		$stmt->execute();
		$stmt->close();
	}
	echo "<h2>Thank you! Your review and rating have been successfully submitted!</h2>";
?>