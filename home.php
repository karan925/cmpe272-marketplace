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
  <a class="active" href="./home.php">Home</a>
  <a href="./companies_link.php">Marketplace Members</a>
  <a href="./reviews.php">Add a Review</a>
  <a href="./marketplace_popular.php">Most Popular Products</a>
  <a href="./visit_history.php">My History</a>
  <a href="./authenticate.php">Log In/Sign Up</a>
  <a href="./logout.php">Log Out</a>
</div>
</header>
<body>

<h1>AJKM Marketplace</h1>
<p>Pictures and stuff can go here.</p>
<?php 
      $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");

      mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
      $query = "SELECT * FROM heroku_8c6c26a69cb9c50.session_status WHERE status = 'session'";

      if ( !( $result = mysqli_query($con, $query))) {
          print("Could not execute query! <br />");
          die();
      }

      foreach ($result as $x) {
         $loggedin = $x['loggedin'];
         $Username = $x['username'];
     }

      if ($loggedin == 1) {
         echo '<div class="Container">';
         echo '<div class="row">';
         echo '<div class="col-6 offset-8">';
         echo "Welcome to our Marketplace: ".$Username."!";
         echo '</div>';
         echo '</div>';
         echo '</div>';
      }
    ?>

</body>
</html>