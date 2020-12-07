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
<meta http-equiv="refresh" content="10" > 
<body>

<h3>Your Previously Visited Products</h3>
<p>The list of all the user's product visit history will go here.</p>
<?php 
// echo $_SESSION['username'];
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
      $query = "SELECT * FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$Username."'";
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
         $query = "SELECT history FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$Username."'";
         $result = mysqli_query($con, $query);
         $unserialized = array();
         foreach ($result as $x) {
             $unserialized = $x['history'];
         }
         $history = array_reverse(unserialize($unserialized));
         $ozone = array('/Skyscraper.php', '/Museums.php', '/TrainStation.php', '/Houses.php', '/Airports.php', '/Apartments.php', '/BusinessComplex.php', '/ShoppingComplex.php', '/Stadiums.php', '/Landmarks.php');
         
         foreach ($history as $page) {
            $name = substr($page, 1,-4);
            $searchpos1 = array_search($page, $ozone);
            if ($searchpos1 !== FALSE) {
               $link = 'http://myozone.org/'.$page;
            }
            echo '<ol><a href="'.$link.'"><strong>'.$name.'</strong></a></ol>';
         }
      }

   }
   else {
      echo "Log in to see Visit History";
      echo '<a href="./authenticate"><button>Log In Here!</button></a>';
   }
?>

</body>
</html>