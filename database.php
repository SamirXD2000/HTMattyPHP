<?php
$servidor = 'localhost';
$usuario = 'root';
$password = 'root';
$bdatos='nutriologo';

$con = mysqli_connect($servidor, $usuario, $password);
$db=mysqli_select_db($con, $bdatos);


?>