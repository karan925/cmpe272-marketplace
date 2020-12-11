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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
      font-family: courier;
    }
    .w3-content {
      text-align:center;
    }
    img {
      text-align:center;
      width: 40%;
      height: 30%;
      display:block;
      margin:auto;
    }
    .Container{
      font-family: courier;
    }
    h5 {
      font-family: courier;
      text-align: center;
    }
    .panel-footer{
      font-family: courier;
      text-align: center;
    }
    .panel-heading{
      font-family: courier;
      text-align: center;
    }
    .container{
      background: white;
    }
  </style>
</header>
<body>

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
   echo '<div class="col-6 offset-10">';
   echo "<strong> Logged In as: ".$Username." </strong>";
   echo '</div>';
   echo '</div>';
   echo '</div>';
 }
 ?>
  <div class="container">
    <div class="jumbotron">
      <h1>Welcome to AJKM Marketplace</h1>
    </div>
  </div>

  <h5>Check Out the Recently Sold Items below!</h5>
  <div class="w3-content w3-display-container">
    <img class="mySlides" src="pics/car.jpg" width="400" height="400">
    <img class="mySlides" src="pics/pot.jpg" width="400" height="400">
    <img class="mySlides" src="pics/build.jpg" width="400" height="400">
    <img class="mySlides" src="pics/star.jpg" width="400" height="400">

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
 
  <br>
  <br>

  <div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="pics/v.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 or more and get a 15% discount!</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="pics/redPotato.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 or more and get a 15% discount!</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="pics/a.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Recently Added</div>
        <div class="panel-body"><img src="pics/h1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Recently Added</div>
        <div class="panel-body"><img src="pics/m1.jpg"  class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Recently Reduced Price!</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Recently Added</div>
        <div class="panel-body"><img src="pics/l1.jpg"  class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">HOT!!!</div>
      </div>
    </div>
  </div>
</div><br><br>

</body>
</html>