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
<body>
<?php 
    extract( $_POST );
    $company = $Company;
    $top_5 = $list;
    $total = $count;
    $prod = $product;
    $unserialized = unserialize($top_5);

    $query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = "."'".$company."'";
    $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");
    
    mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
    if ( !( $result = mysqli_query($con, $query))) {
        print("Could not execute query! <br />");
        die();
    }
    if (mysqli_num_rows($result) == 0) {
        // $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_per (company, products_list) VALUES ("."'".$company."', "."'".$top_5."'".")";
        // if ($con -> query($query) === TRUE) {
        //     echo "SUCCESS";
        // }
        $visit_history = array();
        $visit_history[$prod] = 1;
        $serialized_history = serialize($visit_history);
        $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_per (company, products_list) VALUES ("."'".$company."', "."'".$serialized_history."'".")";
        if ($con -> query($query) === TRUE) {
            echo "SUCCESS";
        }
    }
    else {
        $query = "SELECT products_list FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = "."'".$company."'";
        $result = mysqli_query($con, $query);
        $unserialized = array();
        foreach ($result as $x) {
            $unserialized = $x['products_list'];
        }
        $prod_list = unserialize($unserialized);
        if (isset($prod_list[$prod])) {
            $prod_list[$prod] += 1;
        }
        else {
            $prod_list[$prod] = 1;
        }
        $serialized_history = serialize($prod_list);
        echo $serialized_history;
        $query = "DELETE FROM heroku_8c6c26a69cb9c50.most_visited_per WHERE company = "."'".$company."'";
        if ($con -> query($query) === TRUE) {
            echo "SUCCESS11";
        }
        else {
            echo "FAILED";
        }
        $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_per (company, products_list) VALUES ("."'".$company."', "."'".$serialized_history."'".")";
        if ($con -> query($query) === TRUE) {
            echo "SUCCESS111";
        }
    }

    // $query = "SELECT * FROM heroku_8c6c26a69cb9c50.most_visited_tot WHERE company = "."'".$company."'";
    // $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");

    // mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
    // if ( !( $result = mysqli_query($con, $query))) {
    //     print("Could not execute query! <br />");
    //     die();
    // }
    // if (mysqli_num_rows($result) == 0) {
    //     $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_tot (company, product_count) VALUES ("."'".$company."', "."'".$total."'".")";
    //     if ($con -> query($query) === TRUE) {
    //         echo "SUCCESS";
    //     }
    // }
    // else {
    //     $query = "DELETE FROM heroku_8c6c26a69cb9c50.most_visited_tot WHERE company = "."'".$company."'";
    //     if ($con -> query($query) === TRUE) {
    //         echo "SUCCESS11";
    //     }
    //     else {
    //         echo "FAILED";
    //     }
    //     $query = "INSERT INTO heroku_8c6c26a69cb9c50.most_visited_tot (company, product_count) VALUES ("."'".$company."', "."'".$total."'".")";
    //     if ($con -> query($query) === TRUE) {
    //         echo "SUCCESS111";
    //     }
    // }
?>

</body>
</html>