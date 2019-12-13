<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$conexion=mysqli_connect("localhost", "root", "root", "nutriologo");
$consulta="SELECT * FROM nutriologo where idNutriologo ='$usuario' and Contrasena = '$clave'";
$resultado=mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

session_start();
$_SESSION['usuario'] = $usuario;

/*

$id = $_POST['clave'];
session_start();
$_SESSION['id'] = $id;



*/

if ($filas > 0)
{
	header("location:index2.php");
	session_start();
	$_SESSION['usuario']=$usuario;
	$_SESSION['clave']=$clave;
}
else
{
	echo "Error en la autenticación";
}
mysqli_free_result($resultado);
mysqli_close($conexion);