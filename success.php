<?php
header('Access-Control-Allow-Origin: *');

if(isset($_POST['reff_id'])){
    validationCheck($_POST['reff_id']);
    echo "Database Update";
}else{
    echo "Database Update Fail";
}

// Payment Verify Api
function validationCheck($reff_id){
    $postUrl = "https://api.1card.com.bd/dis-english-shurjopay/validationserveripn";
    $ch = curl_init();
    $header = array("Accept:application/json");

    $data = array(
        'reff_id'=> $reff_id,
        'token'=> 'ceb263b97edc55698ab6fcf755ebcc1d'
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
}