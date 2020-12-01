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
  <a href="./visit_history.php">My History</a>
  <a class = "active" href="./authenticate.php">Log In/Sign Up</a>
</div>
</header>
<?php
    extract( $_POST );
    $product = $Product;
    $loggedin = $Loggedin;
    $username = $Username; 
    if ($username) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        $query = "SELECT * FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$username."'";
        $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");

        mysqli_select_db($con, "heroku_8c6c26a69cb9c50");

        if ( !( $result = mysqli_query($con, $query))) {
            print("Could not execute query! <br />");
            die();
        }
        if (mysqli_num_rows($result) == 0) {
            $history = array();
            array_push($history, $product);
            $serialized = serialize($history);
            $query = "INSERT INTO heroku_8c6c26a69cb9c50.users_history (username, history) VALUES ("."'".$username."', "."'".$serialized."'".")";
            if ($con -> query($query) === TRUE) {
                echo "SUCCESS";
            }
        }
        else {
            echo "RUNNING";
            $query = "SELECT history FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$username."'";
            $result = mysqli_query($con, $query);
            $unserialized = array();
            foreach ($result as $x) {
                $unserialized = $x['history'];
            }
            // echo $unserialized;
            $history = unserialize($unserialized);
            $searchpos = array_search($product, $history);
            if ($searchpos !== FALSE) {
                array_splice($history, $searchpos, 1);
                array_push($history, $product);
            }
            else {
                if (count($history) == 5) {
                    array_shift($history);
                    array_push($history, $product);
                 }
                else {
                    array_push($history, $product);
                }
            }
            $serialized = serialize($history);
            echo $serialized;
            $query = "DELETE FROM heroku_8c6c26a69cb9c50.users_history WHERE username = "."'".$username."'";
            if ($con -> query($query) === TRUE) {
                echo "SUCCESS";
            }
            else {
                echo "FAILED";
            }
            $query = "INSERT INTO heroku_8c6c26a69cb9c50.users_history (username, history) VALUES ("."'".$username."', "."'".$serialized."'".")";
            if ($con -> query($query) === TRUE) {
                echo "SUCCESS2";
            }
            else {
                echo "FAILED";
            }
        }

    }

?>