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
  <a class = "active" href="./companies_link.php">Marketplace Members</a>
  <a href="./reviews.php">Add a Review</a>
  <a href="./marketplace_popular.php">Most Popular Products</a>
  <a href="./visit_history.php">My History</a>
  <a href="./authenticate.php">Log In/Sign Up</a>
  <a href="./logout.php">Log Out</a>
</div>
<style>
  * {
  box-sizing: border-box;
}
  ul{
    line-height:150%;
    list-style:none;
  }
  .col{
    float:left;
    width:25%;
    padding:10px;

  }
  li{

  }
  div.review{
    background-color: #f2f2f2;  }
  .row:after{
    content:"";
    display:table;
    clear:both;
  }
  .name{
    font-weight: bold;
  }
  h2{
    text-align: center;
    padding: 20px 50px;
    font-family: courier;
  }
  h5{
    text-align: center;
    font-family: courier;
  }
  .col{
    font-size: 20px;
  }

</style>
</header>
<body>

<h2>Trending Vendors</h2>


<h5>Below are some of our top vendors and their top products. Check them out! </h5>
<?php 
        $conn = new mysqli("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723","heroku_8c6c26a69cb9c50");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT item, score FROM(SELECT item, score FROM heroku_8c6c26a69cb9c50.rating WHERE siteholder='PotatoInc')a
                ORDER BY score DESC LIMIT 5";
        $sql2 = "SELECT item, score FROM(SELECT item, score FROM heroku_8c6c26a69cb9c50.rating WHERE siteholder='Ozone')a
                ORDER BY score DESC LIMIT 5";
        $sql3 = "SELECT item, score FROM(SELECT item, score FROM heroku_8c6c26a69cb9c50.rating WHERE siteholder='SFDB')a
                ORDER BY score DESC LIMIT 5";
        $sql4 = "SELECT item, score FROM(SELECT item, score FROM heroku_8c6c26a69cb9c50.rating WHERE siteholder='KaranT')a
                ORDER BY score DESC LIMIT 5";
        printf('<div class="row">');
        if($result = $conn->query($sql)){

          printf('<div class="col">');
          printf('<ul>');
          printf('<a target = "_blank" href="https://liuj.us/Products.html"><h2>Potato Inc Products</h2></a>');
          while($row = $result->fetch_assoc()) {
            $prod = $row["item"]; $rating = strval($row["score"]);
            printRating($prod,$rating);
            printReviews($conn, $prod);
            printf('<br>');
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql2)){

          printf('<div class="col">');
          printf('<ul>');
          printf('<a target = "_blank" href="http://myozone.org/product.php"><h2>Ozone Products</h2></a>');
          while($row = $result->fetch_assoc()) {
            $prod = $row["item"]; $rating = strval($row["score"]);
            printRating($prod,$rating);
            printReviews($conn, $prod);
            printf('<br>');
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql3)){

          printf('<div class="col">');
          printf('<ul>');
          printf('<a target = "_blank" href="http://www.cmpe272mustafay.com/hw/hw2_products_services.php"><h2>SFDB Products</h2></a>');
          while($row = $result->fetch_assoc()) {
            $prod = $row["item"]; $rating = strval($row["score"]);
            printRating($prod,$rating);
            printReviews($conn, $prod);
            printf('<br>');
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql4)){

          printf('<div class="col">');
          printf('<ul>');
          printf('<a target = "_blank" href="https://karantrucking.herokuapp.com/products.php"><h2>Karan Trucking Products</h2></a>');
          while($row = $result->fetch_assoc()) {
            $prod = $row["item"]; $rating = strval($row["score"]);
            printRating($prod,$rating);
            printReviews($conn, $prod);
            printf('<br>');
          }
          printf('</ul>');
          printf('</div>');
        }
        
        printf('<div>');
        $conn->close();
      function printRating($prod, $rating){
        printf('<h3>'.$prod.'</h3>');
        printf('<h4>Overall Ratings: '.$rating.'</h4>');
      }
      function printReviews($conn, $val){
        //$rev = "SELECT name, content FROM(SELECT * FROM heroku_8c6c26a69cb9c50.review WHERE item=?)a ORDER BY RANd() LIMIT 3";
        $stmt = $conn->prepare("SELECT name, content FROM(SELECT * FROM heroku_8c6c26a69cb9c50.review WHERE item=?)a ORDER BY RANd() LIMIT 3");
        $stmt -> bind_param("s", $val);
        $stmt ->execute();
        if($result=$stmt->get_result()){
          printf('<div class="review"><ul>');
          while($row= $result->fetch_assoc()){
            printf('<li class="name">'.$row["name"].'</li>');
            printf('<li class="comment">'.$row["content"].'</li>');
          }
          printf('</ul></div>');
        }
      }
?>


</body>
</html>