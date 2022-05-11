<?php

/* See https://stackoverflow.com/questions/5647461/how-do-i-send-a-post-request-with-php */
function curlPost($url, $data = NULL, $headers = []) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5); //timeout in seconds
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_ENCODING, 'identity');

  
  if (!empty($data)) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  }

  if (!empty($headers)) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  }

  $response = curl_exec($ch);
  if (curl_error($ch)) {
      trigger_error('Curl Error:' . curl_error($ch));
  }

  curl_close($ch);
  return $response;
}

$response=curlPost("http://localhost:8800");
// $response=curlPost("http://www.google.ch");

print_r($response);
