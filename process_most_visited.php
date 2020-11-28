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
</div>
</header>
<body>
<?php 
    extract( $_POST );
    $company = $Company;
    $top_5 = $list;
    $unserialized = unserialize($top_5);

    $query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = "."'".$company."'";
    $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
    
    mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
    if ( !( $result = mysqli_query($con, $query))) {
        print("Could not execute query! <br />");
        die();
    }
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_per (company, products_list) VALUES ("."'".$company."', "."'".$top_5."'".")";
        if ($con -> query($query) === TRUE) {
            echo "SUCCESS";
        }
    }
    else {
        $query = "DELETE FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = "."'".$company."'";
        if ($con -> query($query) === TRUE) {
            echo "SUCCESS11";
        }
        else {
            echo "FAILED";
        }
        $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_per (company, products_list) VALUES ("."'".$company."', "."'".$top_5."'".")";
        if ($con -> query($query) === TRUE) {
            echo "SUCCESS111";
        }
    }
    // echo $company;
    // echo $top_5;
?>

</body>
</html>