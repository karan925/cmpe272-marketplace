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
    h2 {
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
    .jumbotron{
      background-color: #ffffff;
    }
    .topnav
    {
      text-align: center;
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
      <h1>AJKM Marketplace</h1>
    </div>
  </div>
  <h2>Welcome!</h2>
  <h5>Check Out the Recently Sold Items below!</h5>
  <div class="container"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="pics/m1.jpg" alt="car" style="width:80%;">
      </div>

      <div class="item">
        <img src="pics/l1.jpg" alt="car" style="width:80%;">
      </div>
    
      <div class="item">
        <img src="pics/h1.jpg" alt="house" style="width:80%;">
      </div>

      <div class="item">
        <img src="pics/pp.jpg" alt="media" style="width:80%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
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
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="pics/redPotato.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 or more and get a 15% discount!</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
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
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Top Seller</div>
        <div class="panel-body"><img src="pics/sc.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Top Seller</div>
        <div class="panel-body"><img src="pics/ne.jpg"  class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Recently Reduced Price!</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Top Seller</div>
        <div class="panel-body"><img src="pics/mr.jpg"  class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">HOT!!!</div>
      </div>
    </div>
  </div>
</div><br><br>

</body>
</html>