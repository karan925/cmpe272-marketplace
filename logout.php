<?php 
        $con = mysqli_connect("us-cdbr-east-02.cleardb.com", "b74d7cacca644f", "96adc723");

        mysqli_select_db($con, "heroku_8c6c26a69cb9c50");
        
        $query = "SELECT * FROM heroku_8c6c26a69cb9c50.session_status WHERE status = 'session'";
        if ( !( $result = mysqli_query($con, $query))) {
            print("Could not execute query 1! <br />");
            die();
        }

        if (mysqli_num_rows($result) !== 0) {
            $query = "DELETE FROM heroku_8c6c26a69cb9c50.session_status WHERE status = 'session'";
            if ( !( $result = mysqli_query($con, $query))) {
                print("Could not execute query 2! <br />");
                die();
            }
        }
        $handle = curl_init();
        $url = "http://myozone.org/logout_from_market.php";
        
        
        $postData = array(
        'Logout' => true
        );
        
        curl_setopt_array($handle,
        array(
            CURLOPT_URL => $url,
            CURLOPT_POST       => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_RETURNTRANSFER     => true,
        )
        );
        
        $data = curl_exec($handle);
        curl_close($handle);
        echo $data;
        header("Location: ./home.php");
?>