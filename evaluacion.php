<?php
	session_start();
	include('database.php');
	if (!isset($_SESSION["usuario"])) 
	{
    	header("Location: index.php");
    	exit();
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/evaluacion.css">
	<title>Evaluación</title>
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
	<div class="cosas">
		<a href="antropometrica.php" target="_blank"><button>Antropometrica</button></a>
		<a href="bioquimica.php" target="_blank"><button>Bioquimica</button></a>
		<a href="clinica.php" target="_blank"><button>Clinica</button></a>
		<a href="dietetica.php" target="_blank"><button>Dietetica</button></a>
	</div>

	
</body>
</html>