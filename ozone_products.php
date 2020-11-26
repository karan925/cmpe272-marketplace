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
    function httpPost($url,$params)
    {
      $postData = '';
       //create name value pairs seperated by &
       foreach($params as $k => $v) 
       { 
          $postData .= $k . '='.$v.'&'; 
       }
       $postData = rtrim($postData, '&');
     
        $ch = curl_init();  
     
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 
        // curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
     
        $output=curl_exec($ch);
     
        curl_close($ch);
        return $output;
     
    }
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if (isset($_SESSION['userinfo'])) {
            $history = $_SESSION['userinfo']['History'];
            // $handle = curl_init();
            // $url = "http://localhost:6969/product.php";
            
            
            // $postData = array(
            // 'Loggedin' => true,
            // 'Username'  => $_SESSION['username']
            // );
            
            // curl_setopt_array($handle,
            // array(
            //     CURLOPT_URL => $url,
            //     CURLOPT_POST       => true,
            //     CURLOPT_POSTFIELDS => $postData,
            //     CURLOPT_RETURNTRANSFER     => true,
            // )
            // );
            
            // $data = curl_exec($handle);
            
            // curl_close($handle);

            header("Location: http://localhost:6969/product.php");
        }
        else {
            $_SESSION['userinfo'] = array("History"=>[]);
            echo 'Created';
        }
        echo $_SESSION['username'];
    }
?>