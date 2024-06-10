<?php
require_once "./settings/DBconnect.php";

$cn = new Connection;
$json_response = json_encode($cn->connect());

echo $json_response;

?>
