<?
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
	<title>Dietetica</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/styledietetica.css">
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
		$consultaCita = "SELECT * FROM dietetica where Expediente_clave = $expediente_clave";
	    $pacienteQ = mysqli_query($con, $consultaCita);
	    while ($row = mysqli_fetch_array($pacienteQ)) {
	?>

	<form action="dietetica.php" method="post">
		<section class="theone">
		<p>Persona encargada de la preparación de alimentos</p> <input type="text" name="" value="<?php echo $row ['']; ?> ">
		<p>Consumo de agua</p> <input type="text" name="">
		<p>Comidas fuera de casa</p> <input type="text" name="">
		</section>

		<h1>Frecuencia de alimentos</h1>
		<section class="frec">
		<p>Verduras</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Leguminosas</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Quesos</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Frutas</p><select>
			<option>Nunca</option>
			<option>Siempre</option>
		</select>

		<p>Pollo</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Leche</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Tortillas</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Cerdo</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Aceite</p><select>
			<option>Nunca</option>
			<option>Siempre</option>
		</select> <br>

		<p>Pan</p><select>
			<option>Nunca</option>
			<option>Siempre</option>
		</select>

		<p>Res</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Jugos/Refresco</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Arroz</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Pescado</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Pastas</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Huevo</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Cereales</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

		<p>Embutidos</p><select>
			<option>Nunca</option>
			<option>1 vez a la semana</option>
			<option>3 veces a la semana</option>
			<option>Siempre</option>
		</select>

	</section>

	<h1>Perfil de dieta habitual</h1>

	<section class="dietita">
		<p>Desayuno</p> <input type="text">
		<p>Colación matutina</p> <input type="text">
		<p>Comida</p> <input type="text">
		<p>Colación vespertina</p> <input type="text">
		<p>Cena</p> <input type="text">
	</section>
	</form>
	
	
</body>
</html>