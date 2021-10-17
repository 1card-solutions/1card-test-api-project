<?php
// Database Insert



//...................................

$postUrl = "https://api.1card.com.bd/odootest/pay";
$ch = curl_init();
$header = array("Accept:application/json");

$data = array(
    'user_id'=> '124',
    'reff_id'=> '124',
    'amount'=> $_POST['amount'],
    'cus_name'=> $_POST['cus_name'],
    'cus_email'=> $_POST['cus_email'],
    'cus_address'=> $_POST['cus_address'],
    'cus_city'=> $_POST['cus_city'],
    'cus_state'=> $_POST['cus_state'],
    'cus_postcode'=> $_POST['cus_postcode'],
    'cus_country'=> $_POST['cus_country'],
    'cus_phone'=> $_POST['cus_phone'],
    'currency_code'=> $_POST['currency_code'],
    'success'=> 'http://localhost/1card-test/success.php',
    'redirect'=> 'http://localhost/1card-test/redirect.php'
);

curl_setopt($ch, CURLOPT_URL, $postUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// response of the POST request
$result = curl_exec($ch);
if ($result === FALSE) {
    die('Curl Faild: ' . curl_error($ch));
}
curl_close($ch);
//echo json_decode($result,true);
echo $result;
//...........................