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
<html>
<head lang="es">
	<title>Evaluación química</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/styleclinica.css">
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

	    $consultaCita = "SELECT * FROM clinica where Expediente_clave = $expediente_clave";
	    $pacienteQ = mysqli_query($con, $consultaCita);
	    while ($row = mysqli_fetch_array($pacienteQ)) {

    ?>
    <form method="post" action="clinica.php">
    	<div class="butones">
			<input type="checkbox" value="Polidipsia" id="idpolidipsia" ><p>Polidipsia</p>
			<input type="checkbox" value="Polifagia" id="idpolifagia"><p>Polifagia</p>
			<input type="checkbox" value="Poliuria" id="idpoliuria"><p>Poliuria</p>
			<input type="checkbox" value="Colitis" id="idcolitis"><p>Colitis</p>
			<input type="checkbox" value="Gastritis" id="idGastritis"><p>Gastritis</p>
			<input type="checkbox" value="Nauseas" id="idNauseas"><p>Nauseas</p>
			<input type="checkbox" value="Vómitos" id="idpolifagia"><p>Vómitos</p>
			<input type="checkbox" value="Diarrea" id="idDiarrea"><p>Diarrea</p>
			<input type="checkbox" value="Estreñimiento" id="idestre"><p>Estreñimiento</p>
		</div>

		<div class="alergias">
			<p>Alergias</p> <input type="text" placeholder="(Separar con comas)" id="idalergias" value="<?php echo $row ['alergias']; ?> ">
			<br>
			<p>Otros</p> <input type="text" placeholder="(Separar con comas)" id="idotros" value="<?php echo $row ['otros']; ?> ">
		</div>
    </form>


<?php
	}
?>
	
</body>
</html>