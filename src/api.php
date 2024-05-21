<?php

function getServerInfo( $url, $endpoint, $user, $password){
    $options = array(
        CURLOPT_URL => "http://$url/v1/api/$endpoint",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Accept: application/json'],
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_USERPWD => "$user:$password"
    );
    $curl = curl_init();
    curl_setopt_array($curl, $options);
    $data = curl_exec($curl);
    curl_close($curl);
    return json_decode($data, true);
}