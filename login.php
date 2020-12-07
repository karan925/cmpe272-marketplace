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
        if ( !$Username || !$Password ) {
            fieldsBlank();
            die();
        }

        $query = "SELECT * FROM heroku_8c6c26a69cb9c50.users_test WHERE username = "."'".$Username."' ". "AND password = "."'".$Password."'";
        $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");

        mysqli_select_db($con, "heroku_8c6c26a69cb9c50");

        if ( !( $result = mysqli_query($con, $query))) {
            print("Could not execute query! <br />");
            die();
        }

        if (mysqli_num_rows($result) == 0) {
            invalidAuthentication();
            die();
        }
        else {
            $query = "SELECT * FROM heroku_8c6c26a69cb9c50.session_status WHERE status = 'session'";
            if ( !( $result = mysqli_query($con, $query))) {
                print("Could not execute query 1! <br />");
                die();
            }

            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO heroku_8c6c26a69cb9c50.session_status (status, loggedin, username) VALUES ('session', 1,"."'".$Username."'".")";
                if ( !( $result = mysqli_query($con, $query))) {
                    print("Could not execute query 2! <br />");
                    die();
                }
            }
            else {
                $query = "DELETE FROM heroku_8c6c26a69cb9c50.session_status WHERE status = 'session'";
                if ( !( $result = mysqli_query($con, $query))) {
                    print("Could not execute query 3! <br />");
                    die();
                }
                $query = "INSERT INTO heroku_8c6c26a69cb9c50.session_status (status, loggedin, username) VALUES ('session', 1,"."'".$Username."'".")";
                if ( !( $result = mysqli_query($con, $query))) {
                    print("Could not execute query 4! <br />");
                    die();
                }
            }
            ### Curling Login Page in Each Webpage
            $handle = curl_init();
            $url = "http://myozone.org/login_from_market.php";
            $url1 = "https://liuj.us/login_from_market.php";
            $url2 ="https://karantrucking.herokuapp.com/login.php";
            $url3 = "http://cmpe272mustafay.com/hw/login_from_market.php";
            $urls = array($url,$url1, $url2, $url3);
            
            $postData = array(
            'Username' => $Username,
            'Password'  => $Password
            );
            
            foreach($urls as $u ){
            $handle = curl_init();
            curl_setopt_array($handle,
            array(
                CURLOPT_URL => $u,
                CURLOPT_POST       => true,
                CURLOPT_POSTFIELDS => $postData,
                CURLOPT_RETURNTRANSFER     => true,
            )
            );
            
            $data = curl_exec($handle);
            curl_close($handle);
            
            }

            header("Location: ./home.php");
        }

        function invalidAuthentication() {
            echo '<body>';
            echo '<h1 class="col-8 offset-2">Invalid Username or Password!</h1>';
            echo '</body>';
        }
     
        function fieldsBlank() {
            echo '<body>';
            echo '<h1 class="col-8 offset-2"> Please fill in all form fields.</h1>';
            echo '</body>';
        }
?>