<?php
$ip = $_SERVER['REMOTE_ADDR'];

$response = file_get_contents("http://ip-api.com/json/$ip");
$data = json_decode($response, true);

echo json_encode([
  "ip" => $ip,
  "city" => $data['city'] ?? '',
  "region" => $data['regionName'] ?? '',
  "country" => $data['country'] ?? ''
]);
?>
