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
  <a href="./reviews.php">Add a Review</a>
  <a href="./marketplace_popular.php">Most Popular Products</a>
  <a class = "active" href="./visit_history.php">My History</a>
  <a href="./authenticate.php">Log In/Sign Up</a>
</div>
</header>
<body>

<h3>Your Previously Visited Products</h3>
<p>The list of all the user's product visit history will go here.</p>
<?php 
// echo $_SESSION['username'];
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      $query = "SELECT * FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$_SESSION['username']."'";
      $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");

      mysqli_select_db($con, "heroku_8c6c26a69cb9c50");

      if ( !( $result = mysqli_query($con, $query))) {
         print("Could not execute query! <br />");
         die();
      }
      if (mysqli_num_rows($result) == 0) {
            echo "No Visit History at the moment. Go shop.";
      }
      else {
         $query = "SELECT history FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$_SESSION['username']."'";
         $result = mysqli_query($con, $query);
         $unserialized = array();
         foreach ($result as $x) {
             $unserialized = $x['history'];
         }
         // echo $unserialized;
         $history = unserialize($unserialized);
         foreach ($history as $page) {
            echo '<li>'.$page.'</li>';
         }
         // print_r($history);
      }

   }
?>

</body>
</html>