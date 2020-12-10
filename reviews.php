<?php session_start(); ?>
<!DOCTYPE html>
<html>
<header>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <!-- build:css css/main.css -->
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

<h3>Choose a product and add a review or view a review</h3>
<p>Functionality that allows user to choose any product in the marketplace and rate it will go here.</p>
 <a href="./reviewForm.php">Submit a Review</a>



<?php 
        $conn = new mysqli("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723","heroku_8c6c26a69cb9c50");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo 'connection is stable';
        $sql = "SELECT * FROM heroku_8c6c26a69cb9c50.products WHERE company='PotatoInc'";
        //^connection works
        $result = mysqli_query($conn, $sql);
        if($result){
          echo 'query is stable';
          while($row = mysqli_fetch_assoc($result)) {
            echo 'fetch data block';
          }
        }
?>
  


</body>
</html>