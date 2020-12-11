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
  <a href="./logout.php">Log Out</a>
</div>
<style>
   h3{
      text-align: center;
      font-family: courier;
      padding: 20px 50px;
   }

</style>
</header>
<meta http-equiv="refresh" content="10" > 
<body>

<h3>Your Previously Visited Products</h3>
<br>
<?php 
   $name_mapper = array();
   $name_mapper['product1'] = '2019 Porsche 911';
   $name_mapper['product2'] = '2018 Mercedes-Benz AMG C63 S';
   $name_mapper['product3'] = '2020 Tesla Roadster';
   $name_mapper['product4'] = '2020 Audi R8 5.2 V10 Performance';
   $name_mapper['product5'] = '2017 Ferrari 488 Spider Base';
   $name_mapper['product6'] = '2019 Mclaren F1';
   $name_mapper['product7'] = '2018 Lamborghini Aventador S';
   $name_mapper['product8'] = '2016 BMW M3';
   $name_mapper['product9'] = '2019 BMW M6';
   $name_mapper['product10'] = '2019 Mercedes G-Wagon AMG';
   $name_mapper['products/FondantPotato'] = 'Fondant Potato';
   $name_mapper['products/RattePotato'] = 'Ratte Potato';
   $name_mapper['products/RedPotato'] = 'Red Potato';
   $name_mapper['products/Fries'] = 'French Fries';
   $name_mapper['products/GreenPotato'] = 'Green Potato';
   $name_mapper['products/RoastedPotato'] = 'Roasted Potato';
   $name_mapper['products/KerrPotato'] = 'Kerr Potato';
   $name_mapper['products/Vitelotte'] = 'Vitelotte';
   $name_mapper['products/PotatoJuice'] = 'Potato Juice';
   $name_mapper['products/YukonPotato'] = 'Yukon Potato';
   $name_mapper['hw/products/hw5_product1'] = 'A Scanner Darkly';
   $name_mapper['hw/products/hw5_product2'] = 'Blade Runner: The Final Cut';
   $name_mapper['hw/products/hw5_product3'] = 'Ghost in the Shell (2020 4k BD)';
   $name_mapper['hw/products/hw5_product4'] = 'Minority Report';
   $name_mapper['hw/products/hw5_product5'] = 'Psycho-Pass (BD/DVD Combo)';
   $name_mapper['hw/products/hw5_product6'] = 'Do Androids Dream of Electric Sheep?';
   $name_mapper['hw/products/hw5_product7'] = 'Dune';
   $name_mapper['hw/products/hw5_product8'] = 'Neuromancer';
   $name_mapper['hw/products/hw5_product9'] = 'The Foundation Trilogy';
   $name_mapper['hw/products/hw5_product10'] = 'Ubik';
   $trucking = array('product1', 'product2', 'product3', 'product4', 'product5', 'product6', 'product7', 'product8', 'product9', 'product10');
   $potatos = array('products/FondantPotato', 'products/RattePotato', 'products/RedPotato', 'products/Fries', 'products/GreenPotato', 'products/RoastedPotato', 'products/KerrPotato', 'products/Vitelotte', 'products/PotatoJuice', 'products/YukonPotato');
   $sfdb = array('hw/products/hw5_product1', 'hw/products/hw5_product2', 'hw/products/hw5_product3', 'hw/products/hw5_product4', 'hw/products/hw5_product5', 'hw/products/hw5_product6', 'hw/products/hw5_product7', 'hw/products/hw5_product8', 'hw/products/hw5_product9', 'hw/products/hw5_product10');
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
            $name1 = substr($page, 1,-4);
            $searchpos1 = array_search($page, $ozone);
            $searchpos2 = array_search($name1, $trucking);
            $searchpos3 = array_search($name1, $potatos);
            $searchpos4 = array_search($name1, $sfdb);
            if ($searchpos1 !== FALSE) {
               $link = 'http://myozone.org/'.$page;
               $name = $name1;
            }
            if ($searchpos2 !== FALSE) {
               $link = 'https://karantrucking.herokuapp.com/'.$page;
               $name = $name_mapper[$name1];
            }
            if ($searchpos3 !== FALSE) {
               $link = "https://liuj.us/".$page;
               $name = $name_mapper[$name1];
            }
            if ($searchpos4 !== FALSE) {
               $link = "http://www.cmpe272mustafay.com/".$page;
               $name = $name_mapper[$name1];
            }
            echo '<ol><a href="'.$link.'"><strong>'.$name.'</strong></a></ol>';
         }
      }

   }
   else {
      echo "Log in to see Visit History";
      echo '<a href="./authenticate.php"><button>Log In Here!</button></a>';
   }
?>

</body>
</html>