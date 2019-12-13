<?php  
	session_start();
	include('database.php');
	if (!isset($_SESSION["usuario"])) 
	{
    	header("Location: index.php");
    	exit();
	}

	if(isset($_POST['guardar']))
	{
		$problema=$_POST['problema'];
		$etiologia=$_POST['etiologia'];
		$signos_sintomas=$_POST['signos_sintomas'];
		$fechaRealizado=$_POST['fechaRealizado'];
		$encargadoComprayHacerComida=$_POST['encargadoComprayHacerComida'];
		$consumoAgua=$_POST['consumoAgua'];
		$comidaOutCasa=$_POST['comidaOutCasa'];
		$Expediente_clave=$_POST['Expediente_clave'];

			$consulta = "INSERT INTO diagnostico(problema, etiologia, signos_sintomas, fechaRealizado, encargadoComprayHacerComida, consumoAgua, comidaOutCasa, Expediente_clave ) VALUES('$problema',  '$etiologia', '$signos_sintomas',  '$fechaRealizado',  '$encargadoComprayHacerComida', '$consumoAgua',  '$comidaOutCasa',  '$Expediente_clave')";
    		mysqli_query($con, $consulta);
	}
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
		<form action="" method="post">
			<div>
				<p>Problema</p>
				<input type="text" id="problem" name="problema">
			</div>
			<div>
				<p>Etiología</p>
				<input type="text" id="eti" name="etiologia">
			</div>
			<div>
				<p>Signos y síntomas</p>
				<input type="text" id="signs" name="signos_sintomas">
			</div>

			<div>
				<p>Encargado de hacer comida</p>
				<input type="text" id="signs" name="encargadoComprayHacerComida">
			</div>

			<div>
				<p>Consumo de agua</p>
				<input type="number" id="signs" name="consumoAgua">
			</div>

			<div>
				<p>Fecha</p>
				<input type="date" id="signs" name="fechaRealizado">
			</div>

			<div>
				<p>Comida fuera de casa</p>
				<input type="text" id="signs" name="comidaOutCasa">
			</div>

			<div>
				<p>Expediente</p>
				<input type="number" id="signs" name="Expediente_clave">
			</div>

			<input type="submit" name="guardar" value="guardar">
		</form>



</body>
</html>
