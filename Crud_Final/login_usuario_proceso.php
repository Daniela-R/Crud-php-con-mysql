<?php

$email = $_POST['email'];
$password = $_POST['password'];

session_start();
$_SESSION['email'] = $email;

/* Se define un objeto vacio para los datos del usuario */


$conexion = mysqli_connect("localhost", "root", "", "events");

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conexion, $query);

$rows = mysqli_num_rows($result);

$getUserByEmailQuery = "SELECT * FROM users WHERE email = '$email'";
$getUserByEmail = mysqli_query($conexion, $getUserByEmailQuery);

$_SESSION['user'] = mysqli_fetch_assoc($getUserByEmail);

if ($rows > 0) {
    header("Location:Pagina_principal.php?message=successLogin");
} else {
    header("Location:index.php?message=errorLogin");
}

mysqli_close($conexion);
