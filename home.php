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
  <style>
    h1{ 
      text-align: center;
      padding: 20px 50px;
    }
    .w3-content {
    width: 50%;
    height: auto;
    position: relative;
    text-align: center; 
    display: block;
    margin-left: auto;
    margin-right: auto;
    }
  </style>
</header>
<body>

  <h1>Welcome to AJKM Marketplace</h1>
  <div class="w3-content w3-display-container">
    <img class="mySlides" src="pics/car.jpg" width="300" height="300">
    <img class="mySlides" src="pics/pot.jpg" width="300" height="300">
    <img class="mySlides" src="pics/build.jpg" width="300" height="300">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    <?php  
    echo '<script type="text/JavaScript">  

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
    </script>' ; 
    ?> 
  </div>

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

 <p>Mustafa's products</p>
 <ul>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_1.php">A Scanner Darkly</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_2.php">Blade Runner: The Final Cut</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_3.php">Ghost in the Shell (2020 4K BD)</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_4.php">Minority Report</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_5.php">Psycho-Pass (BD/DVD Combo)</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_6.php">Do Androids Dream of Electric Sheep?</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_7.php">Dune</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_8.php">Neuromancer</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_9.php">The Foundation Trilogy</a></li>
  <li><a href="https://marketplace-272.herokuapp.com/pages_mustafa/mustafa_page_10.php">Ubik</a></li>
</ul>
</body>
</html>