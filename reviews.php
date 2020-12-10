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
<style>
  * {
  box-sizing: border-box;
}
  ul{
    line-height:150%;
  }
  .col{
    float:left;
    width:25%;
    padding:10px;

  }
  .row:after{
    content:"";
    display:table;
    clear:both;
  }
</style>

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

        $sql = "SELECT product FROM heroku_8c6c26a69cb9c50.products WHERE company='PotatoInc'";
        $sql2 = "SELECT product FROM heroku_8c6c26a69cb9c50.products WHERE company='Ozone'";
        $sql3 = "SELECT product FROM heroku_8c6c26a69cb9c50.products WHERE company='SFDB'";
        $sql4 = "SELECT product FROM heroku_8c6c26a69cb9c50.products WHERE company='KaranT'";
        //^connection works
        printf('<div class="row">');
        if($result = $conn->query($sql)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>Potato Inc Products</h2>');
          while($row = $result->fetch_assoc()) {
            printf('<a href="./reviewForm.php"><li>'.$row["product"].'</li></a>');
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql2)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>Ozone Products</h2>');
          while($row = $result->fetch_assoc()) {
            printf('<a href="./reviewForm.php"><li>'.$row["product"].'</li></a>');
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql3)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>SFDB Products</h2>');
          while($row = $result->fetch_assoc()) {
            printf('<a href="./reviewForm.php"><li>'.$row["product"].'</li></a>');
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql4)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>Karan Trucking Products</h2>');
          while($row = $result->fetch_assoc()) {
            printf('<a href="./reviewForm.php"><li>'.$row["product"].'</li></a>');
          }
          printf('</ul>');
          printf('</div>');
        }

        printf('<div>');
        $conn->close();
?>
  


</body>
</html>