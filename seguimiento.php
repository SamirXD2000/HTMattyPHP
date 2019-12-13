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
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/styleseg.css">
	<title>Seguimiento</title>
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
	<div>
		<button>Sesión 2</button>
		<button>Sesión 3</button>
		<button>Sesión 4</button>
		<button>Sesión 5</button>
		<button class="unique">+</button>
	</div>


	<button class="rend">Rendimiento</button>
	
</body>
</html>