<?php


	session_start();

	include('database.php');
	if (!isset($_SESSION["usuario"])) 
	{
    	header("Location: index.php");
    	exit();
	}




	if(isset($_POST['btnBuscar'])) 
	{
		$buscar_text=$_POST['buscar'];
		$consulta="SELECT * FROM expediente WHERE nombre LIKE '$buscar_text.%'";
		$Queryindex=mysqli_query($con, $consulta); 
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de apoyo para el profesional de nutrición</title>
	<link rel="stylesheet" type="text/css" href="Styles/styleindex.css">
</head>
<body>



	<header class="navegacion">
		<img src="Images/loguito2.jpg">
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
			<!--<input type="submit" name="" value="<?php //echo session_destroy(); ?>"> -->
		</div>
		
	</header>

	<form method="post">
		<div class="searchdiv">
			<img src="Images/lupa.svg">
			<input class="searchbar" type="text" class="search" placeholder="Buscar usuario" name="buscar" >
			<input type="submit" class="btn" name="btnBuscar" value="Buscar">
		</div>

	</form>


		<section class="pacientes">
			
			
			<?php 
				include('database.php');
				$usuario = $_SESSION['usuario'];
				
				$consulta="SELECT clave, nombre FROM expediente WHERE Nutriologo_idNutriologo=$usuario";
				$Queryindex=mysqli_query($con, $consulta); 

				while($row=mysqli_fetch_array($Queryindex))
				{
					$clave=$row['clave'];
					?>
					<?php

					echo"<a href='menuexpediente.php?clave=$clave'>";
					echo"<div class='pac'>";
					echo"<h2>".$row['nombre']."</h2>";
					echo"<h3>".$row['clave']."</h3>";
					echo"<a href='deleteexp.php?clave=$clave'><img src='Images/imtrash.jpg'/><a/>";
					echo"</div>";
					echo"</a>";
				}

			?>
			</div>



			<div class="mas">
				<a href="crearexpediente.php"> <img src="Images/mas.png"></a>
			</div>
		</section>
		

		
	
</body>
</html>