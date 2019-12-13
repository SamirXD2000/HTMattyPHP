<?php

	session_start();
	include('database.php');
	if (!isset($_SESSION["usuario"])) 
	{
    	header("Location: index.php");
    	exit();
	}
    include('database.php');
    $idNutriologo=$_SESSION['usuario'];
    $expediente_clave=$_SESSION['clave'];

/*YAAAAAAAAAAA AL 50*/
    $consultaCita = "SELECT nombre FROM nutriologo where idNutriologo = $idNutriologo";
    $pacienteQ = mysqli_query($con, $consultaCita);
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Evaluación bioquimica</title>
	<link rel="stylesheet" type="text/css" href="Styles/stylebioquimica.css">
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
	    $consultaCita = "SELECT * FROM bioquimica where Expediente_clave = $expediente_clave";
    	$pacienteQ = mysqli_query($con, $consultaCita);
    	while ($row = mysqli_fetch_array($pacienteQ)) {
    ?>
    <form method="post" action="bioquimica.php">
    	<div class="mediciones">
			<p>Glucosa</p><input type="text" placeholder="Glucosa" id="idcintura" value="<?php echo $row ['Glucosa']; ?> ">
			<p>Colesterol Total</p><input type="text" placeholder="Colesterol Total" id="idcadera" value="<?php echo $row ['ColesterolTotal']; ?> ">
			<p>LDL</p><input type="text" placeholder="LDL" id="idbraquial" value="<?php echo $row ['lhl']; ?> ">
			<p>HDL</p><input type="text" placeholder="HDL" id="idmuneca" value="<?php echo $row ['hdl']; ?> ">
			<p>Triglicéridos</p><input type="text" placeholder="Triglicéridos" id="idbicipital" value="<?php echo $row ['trigliceridos']; ?> ">
			<p>Microalbuminuria</p><input type="text" placeholder="Microalbuminuria" id="idtricipital" value="<?php echo $row ['microalbuminuria']; ?> ">
		</div>

    </form>


	<?php
		}
	?>
	
</body>
</html>