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

    /*YAAAAAAAAAAAAA AL 50*/

?>



<!DOCTYPE html>
<html>
<head>
	<title>Paciente</title>
	<link rel="stylesheet" type="text/css" href="Styles/stylepaciente.css">
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
	    $consultaCita = "SELECT * FROM antropometrica where Expediente_clave = $expediente_clave";
    	$pacienteQ = mysqli_query($con, $consultaCita);
    	while ($row = mysqli_fetch_array($pacienteQ)) {
    ?>

	<form method="post" action="antropometrica.php">
		<div class="medicionesprimarias">
		<p>Peso</p><input type="text" placeholder="Peso" id="idpeso" name="peso">
		<p>Estatura</p><input type="text" placeholder="Estatura" id="idestatura" name="estatura">
		<p>IMC</p><input type="text" placeholder="IMC" id="idimc" value="<?php echo $row ['imc']; ?> ">
		</div>

		<h1>MEDICIONES</h1>

		<div class="mediciones">
			<p>C. Cintura</p><input type="text" placeholder="Cintura" id="idcintura" value="<?php echo $row ['cCintura']; ?> ">
			<p>C. Cadera</p><input type="text" placeholder="Cadera" id="idcadera" value="<?php echo $row ['cCadera']; ?> ">
			<p>C. Braquial</p><input type="text" placeholder="Braquial" id="idbraquial" value="<?php echo $row ['cBraquial']; ?> ">
			<p>C. Muñeca</p><input type="text" placeholder="Muñeca" id="idmuneca" value="<?php echo $row ['cMuneca']; ?> ">
			<p>P. Bicipital</p><input type="text" placeholder="Bicipital" id="idbicipital" value="<?php echo $row ['pBicipital']; ?> ">
			<p>P. Tricipital</p><input type="text" placeholder="Tricipital" id="idtricipital" value="<?php echo $row ['pTricipital']; ?> ">
			<p>% Grasa</p><input type="text" placeholder="%Grasa" id="idgrasa" value="<?php echo $row ['porGrasa']; ?> ">
			<p>P. Subescapular</p><input type="text" placeholder="Subescapular" id="idsubescapular" value="<?php echo $row ['pSubescapular']; ?> ">
			<p>P. Suprailiaco</p><input type="text" placeholder="Suprailiaco" id="idsuprailiaco" value="<?php echo $row ['pSuprailiaco']; ?> ">
		</div>

		<h1>BIOIMPEDANCIA MAGNÉTICA</h1>

		<div class="bioimpedancia">
			<p>% Grasa</p><input type="text" placeholder="Grasa" id="idgrasa" value="<?php echo $row ['porGrasa']; ?> ">
			<p>% Agua</p><input type="text" placeholder="Agua" id="idagua" value="<?php echo $row ['porAgua']; ?> ">
			<p>% Músculo</p><input type="text" placeholder="Músculo" id="idmusculo" value="<?php echo $row ['porMusculo']; ?> ">
			<p>Grasa visceral</p><input type="text" placeholder="Grasa visceral" id="idvisceral" value="<?php echo $row ['grasaVisceral']; ?> ">
			<p>Kcal Basales</p><input type="text" placeholder="Kcal Basales" id="idbasales" value="<?php echo $row ['kCalBasales']; ?> ">
			<p>Edad Metabólica</p><input type="text" placeholder="Edad Metabólica" id="idedadmetabolica" value="<?php echo $row ['edadMetabolica']; ?> ">

		</div>

		<h1>OBSERVACIONES</h1>
		<div class="observaciones">
			<input type="text" placeholder="Observaciones del paciente" id="idobservaciones" value="<?php echo $row ['observaciones']; ?> ">
		</div>
	</form>

	<?php
		}
	?>
	
	

</body>
</html>