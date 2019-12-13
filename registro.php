<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar']))
	{
		$email=$_POST['email'];
		$nombre=$_POST['nombre'];
		$Contrasena=$_POST['Contrasena'];
		if(!empty($email) && !empty($nombre) && !empty($Contrasena))
		{
			$consulta_insert=$con->prepare('INSERT INTO nutriologo(email, nombre, Contrasena) VALUES(:email, :nombre, :Contrasena)');
			$consulta_insert->execute(array(
				':email' => $email,
				':nombre' => $nombre,
				':Contrasena' => $Contrasena
			));
			header('Location: index.php');
		}
		else
		{
			echo "<script> alert('Está vacío... ves?);</script>";
		}

	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sign-up</title>
	<link rel="stylesheet" type="text/css" href="Styles/registro.css">
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="post">
		<input type="text" name="email" placeholder="Correo electrónico">
		<input type="text" name="nombre" placeholder="Nombre">
		<input type="text" name="Contrasena" placeholder="Contraseña">
		<input type="submit" name="guardar" value="Registrarse">
	</form>

</body>
</html>