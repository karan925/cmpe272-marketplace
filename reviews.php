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
  h2{
    text-align: center;
    padding: 20px 50px;
    font-family: courier;
  }
  p{
    text-align: center;
    font-family: courier;
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

<h2>Add a Review!</h2>

<p>Click on a link below add a review to any of the products offered on our marketplace!</p>


<?php 
        
          /**
        * Establishing mysql connection
        */
        $conn = new mysqli("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723","heroku_8c6c26a69cb9c50");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT * FROM heroku_8c6c26a69cb9c50.session_status WHERE status = 'session'";

        if ( !( $result = mysqli_query($conn, $query))) {
          print("Could not execute query! <br />");
          die();
        }

        foreach ($result as $x) {
          $loggedin = $x['loggedin'];
          $Username = $x['username'];
        }
        if ($loggedin == 0) {
          echo "Log in to leave a review";
          echo '<a href="./authenticate.php"><button class="btn btn-primary">>Log In Here!</button></a>'; 
          die();
        }
        

        /**
        * One SQL query for each company 
        */
        $sql = "SELECT company, product FROM heroku_8c6c26a69cb9c50.products WHERE company='PotatoInc'";
        $sql2 = "SELECT company, product FROM heroku_8c6c26a69cb9c50.products WHERE company='Ozone'";
        $sql3 = "SELECT company, product FROM heroku_8c6c26a69cb9c50.products WHERE company='SFDB'";
        $sql4 = "SELECT company, product FROM heroku_8c6c26a69cb9c50.products WHERE company='KaranT'";
        
        /**
        * Code divided into Row/Col Each company has indiv. column for products
        * printF to generate base layout 
        * fetch_assoc() handles query by row useful if we need a print of every element
        */
        printf('<div class="row">');
        if($result = $conn->query($sql)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>Potato Inc Products</h2>');
          while($row = $result->fetch_assoc()) {
            $comp = $row["company"]; $prod = $row["product"];
            handleQuery($comp, $prod);
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql2)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>Ozone Products</h2>');
          while($row = $result->fetch_assoc()) {
            $comp = $row["company"]; $prod = $row["product"];
            handleQuery($comp, $prod);
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql3)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>SFDB Products</h2>');
          while($row = $result->fetch_assoc()) {
            $comp = $row["company"]; $prod = $row["product"];
            handleQuery($comp, $prod);
          }
          printf('</ul>');
          printf('</div>');
        }
        if($result = $conn->query($sql4)){
          printf('<div class="col">');
          printf('<ul>');
          printf('<h2>Karan Trucking Products</h2>');
          while($row = $result->fetch_assoc()) {
            $comp = $row["company"]; $prod = $row["product"];
            handleQuery($comp, $prod);
          }
          printf('</ul>');
          printf('</div>');
        }

        printf('<div>');
        $conn->close();

        /**
        *@param $comp is the company name
        *@param $prod is the product name
        *uses base64_encode(serialize()) for safe serialization 
        * without this it creates byte inconsistency errors 
        */
        function handleQuery($comp, $prod){
          $prod_info = array($comp,$prod);
            $prod_info =  base64_encode(serialize($prod_info));
            printf('<a href="./reviewForm.php?prod='.$prod_info.'"><li>'.$prod.'</li></a>');
        }
       
?>


</body>
</html>