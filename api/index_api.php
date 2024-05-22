<?php

// Establece las cabeceras para permitir el acceso desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$data = array(
    array("id" => 1, "nombre" => "Producto 1", "precio" => 10.00),
    array("id" => 2, "nombre" => "Producto 2", "precio" => 15.00),
    array("id" => 3, "nombre" => "Producto 3", "precio" => 20.00)
);

$json_response = json_encode($data);

echo $json_response;

?>
