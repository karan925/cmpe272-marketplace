<?php 
$ch = curl_init();
$myurl = "http://cmpe272mustafay.com/hw/products/hw5_product5.php";
curl_setopt ($ch, CURLOPT_URL, $myurl);
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

$file_contents = curl_exec($ch);
// $data = json_decode($file_contents, true);
// print_r($data);
print($file_contents);
curl_close($ch);
?>