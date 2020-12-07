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
  <a class="active" href="./marketplace_popular.php">Most Popular Products</a>
  <a href="./visit_history.php">My History</a>
  <a href="./authenticate.php">Log In/Sign Up</a>
  <a href="./logout.php">Log Out</a>
</div>
</header>
<meta http-equiv="refresh" content="10" >
<body>

<h3>Presentation of the top 5 products in the whole marketplace (most visits/best ratings etc.)</h3>
<?php 
   echo '<div class="Container">';
   echo '<div class="rpw">';
   echo '<div class="col-6 offset-2">';
   echo "<h4>Most Viewed Products at Ozone Inc.</h4>";
   $query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'Ozone'";
   $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
   mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
   if ( !( $result = mysqli_query($con, $query))) {
      print("Could not execute query! <br />");
      die();
   }
   if (mysqli_num_rows($result) == 0) {
         echo "No Product History for Ozone at the moment.";
   }
   else {
      $query = "SELECT products_list FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'Ozone'";
      $result = mysqli_query($con, $query);
      $unserialized = array();
      foreach ($result as $x) {
          $unserialized = $x['products_list'];
      }
      $prod_list = unserialize($unserialized);
      arsort($prod_list);
      $keys = array_keys($prod_list);
      echo '<table class="table"><tr></tr>';
      $count = 0;
      foreach ($keys as $page){
         if ($count == 5) {
         break;
         }
        $filt = substr($page, 1);
        $name = explode(".", $filt)[0];
        $link = 'http://myozone.org/'.$page;
        echo '<tr><td><a href="'.$link.'"><strong>'.$name.'</strong></a></td></tr>';
        $count = $count + 1;
     }
     echo '</table>';
  }   
   echo '</div>';
   echo '</div>';
   echo '</div>';
# -----------------------------------------NEW SITE-------------------
   echo '<div class="Container">';
   echo '<div class="rpw">';
   echo '<div class="col-6 offset-2">';
   echo "<h4>Most Viewed Products at Potato Inc.</h4>";
   $query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'PotatoInc'";
   $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
   mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
   if ( !( $result = mysqli_query($con, $query))) {
      print("Could not execute query! <br />");
      die();
   }
   if (mysqli_num_rows($result) == 0) {
         echo "No Product History for Potato Inc. at the moment.";
   }
   else {
      $query = "SELECT products_list FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'PotatoInc'";
      $result = mysqli_query($con, $query);
      $unserialized = array();
      foreach ($result as $x) {
          $unserialized = $x['products_list'];
      }
      $prod_list = unserialize($unserialized);
      arsort($prod_list);
      $keys = array_keys($prod_list);
      echo '<table class="table"><tr></tr>';
      $count = 0;
      foreach ($keys as $page){
         if ($count == 5) {
         break;
         }
        $filt = substr($page, 1);
        $name = explode(".", $filt)[0];
        $link = ".".$page;
        echo '<tr><td><a href="'.$link.'"><strong>'.$name.'</strong></a></td></tr>';
        $count = $count + 1;
     }
     echo '</table>';
  }   
   echo '</div>';
   echo '</div>';
   echo '</div>';

#---------------------------NEW SITE------------------------------
echo '<div class="Container">';
echo '<div class="rpw">';
echo '<div class="col-6 offset-2">';
echo "<h4>Most Viewed Products at Trucking Inc.</h4>";
$query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'Trucking'";
$con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
if ( !( $result = mysqli_query($con, $query))) {
   print("Could not execute query! <br />");
   die();
}
if (mysqli_num_rows($result) == 0) {
      echo "No Product History for Trucking Inc. at the moment.";
}
else {
   $query = "SELECT products_list FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'Trucking'";
   $result = mysqli_query($con, $query);
   $unserialized = array();
   foreach ($result as $x) {
       $unserialized = $x['products_list'];
   }
   $prod_list = unserialize($unserialized);
   arsort($prod_list);
   $keys = array_keys($prod_list);
   echo '<table class="table"><tr></tr>';
   $count = 0;
   foreach ($keys as $page){
      if ($count == 5) {
      break;
      }
     $filt = substr($page, 1);
     $name = explode(".", $filt)[0];
     $link = ".".$page;
     echo '<tr><td><a href="'.$link.'"><strong>'.$name.'</strong></a></td></tr>';
     $count = $count + 1;
  }
  echo '</table>';
}   
echo '</div>';
echo '</div>';
echo '</div>';

#----------------------NEW SITE-------------------------------
echo '<div class="Container">';
echo '<div class="rpw">';
echo '<div class="col-6 offset-2">';
echo "<h4>Most Viewed Products at Comics Inc.</h4>";
$query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'SFDB'";
$con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
if ( !( $result = mysqli_query($con, $query))) {
   print("Could not execute query! <br />");
   die();
}
if (mysqli_num_rows($result) == 0) {
      echo "No Product History for Comics Inc. at the moment.";
}
else {
   $query = "SELECT products_list FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = 'SFDB'";
   $result = mysqli_query($con, $query);
   $unserialized = array();
   foreach ($result as $x) {
       $unserialized = $x['products_list'];
   }
   $prod_list = unserialize($unserialized);
   arsort($prod_list);
   $keys = array_keys($prod_list);
   echo '<table class="table"><tr></tr>';
   $count = 0;
   foreach ($keys as $page){
      if ($count == 5) {
      break;
      }
     $filt = substr($page, 1);
     $name = explode(".", $filt)[0];
     $link = ".".$page;
     echo '<tr><td><a href="'.$link.'"><strong>'.$name.'</strong></a></td></tr>';
     $count = $count + 1;
  }
  echo '</table>';
}   
echo '</div>';
echo '</div>';
echo '</div>';
?>

</body>
</html>