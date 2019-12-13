<?php
	session_start();
	include('database.php');
	if(isset($_GET['clave']))
	{
		$clave=$_GET['clave'];
		$_SESSION['clave'] = $clave;

		/*
		$clave=$_GET['clave']; AQUI LA CREASASSSS
		$delete=$con->prepare('DELETE FROM expediente WHERE clave=$clave');
		$delete->execute(array(
			':clave'=>$clave
		));
		header('Location: index2.php');
		*/
		
	}



?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/expediente.css">
	<title>Expediente</title>
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
		<a href="evaluacion.php"><button>Evaluación</button></a>
		<a href="diagnostico.php"><button>Diagnóstico</button></a>
		<br>
		<a href="seguimiento.php"><button>Seguimiento</button></a>
		<a href="intervencion.php"><button>Intervención</button></a><br>
		<a href="expediente.php"><button>Ver información básica</button></a>
	</div>
	
	
</body>
</html>