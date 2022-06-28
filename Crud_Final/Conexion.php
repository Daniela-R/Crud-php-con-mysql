<?php

$password = "";
$username = "root";
$database = "events";

try {
    $bd = new PDO(
        'mysql:host=localhost;
        dbname=' . $database,
        $username,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
