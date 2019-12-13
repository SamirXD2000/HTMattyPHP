<?php

	session_start();
	include('database.php');
	if (!isset($_SESSION["usuario"])) 
	{
    	header("Location: index.php");
    	exit();
	}

	$idNutriologo=$_SESSION['usuario'];
    $expediente_clave=$_SESSION['clave'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Diagnóstico</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/stylediagnostico.css">
</head>
<body>
	<header class="navegacion">
		<a href="index2.php"><img src="Images/loguito2.jpg"></a>
		<div class="namesini">
			<?php 
				include('database.php');
				$usuario = $_SESSION['usuario'];
				$consulta="SELECT nombre FROM nutriologo WHERE idNutriologo=$usuario";
				$Queryindex2=mysqli_query($con, $consulta); 

				while($row=mysqli_fetch_array($Queryindex2))
				{

					echo"<h1>".$row['nombre']."</h1>";
					
				}
			?>
		</div>
		
		<div class="contacto">
			<img src="Images/profile.png">
			<img src="Images/conf.svg">
		</div>
	</header>

	<?php
		$consultaCita = "SELECT * FROM diagnostico where Expediente_clave = $expediente_clave";
	    $pacienteQ = mysqli_query($con, $consultaCita);
	    while ($row = mysqli_fetch_array($pacienteQ)) {
	?>
	<form method="post" action="diagnostico.php">
		<div>
			<p>Problema</p>
			<input type="text" id="problem" value="<?php echo $row ['problema']; ?> ">
		</div>
		<div>
			<p>Etiología</p>
			<input type="text" id="eti" value="<?php echo $row ['etiologia']; ?> ">
		</div>
		<div>
			<p>Signos y síntomas</p>
			<input type="text" id="signs" value="<?php echo $row ['signos_sintomas']; ?> ">
		</div>

		<div>
			<p>Encargado de hacer comida</p>
			<input type="text" id="signs" value="<?php echo $row ['encargadoComprayHacerComida']; ?> ">
		</div>

		<div>
			<p>Consumo de agua</p>
			<input type="text" id="signs" value="<?php echo $row ['consumoAgua']; ?> ">
		</div>

		<div>
			<p>Fecha</p>
			<input type="text" id="signs" value="<?php echo $row ['fechaRealizado']; ?> ">
		</div>

		<div>
			<p>Comida fuera de casa</p>
			<input type="text" id="signs" value="<?php echo $row ['comidaOutCasa']; ?> ">
		</div>
	</form>


	<input type="submit" name="" value="CONFIRMAR">

	<?php
		}
	?>
</body>
</html>