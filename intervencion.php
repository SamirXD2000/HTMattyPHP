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
	<title>Intervención</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/intervencion.css">
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
	<form action="intercencion.pgp" method="post">
		<div class="div1">
			<p>Consumo actual de energía</p><input type="text" name="">
			<p>Distribución actual</p><input type="text" name="">
			<p>Gasto enérgico total</p><input type="text" name="">
			<p>HDC</p><input type="text" name="">
			<p>Lip</p><input type="text" name="">
			<p>Prot</p><input type="text" name=""><br>
			<p>Tipo de dieta</p><input type="text" name="">
			<p>Plan de alimentación</p><input type="text" name="" placeholder="Kcal/día">
		</div>
		<h1>Distribución</h1>
		<div class="div2">
			<p>Proteínas:</p><input type="text" name=""  placeholder="%">
			<input type="text" name="" placeholder="Kcal">
			<input type="text" name="" placeholder="Gramos"><br>
			<p>Lípidos</p><input type="text" name=""  placeholder="%">
			<input type="text" name="" placeholder="Kcal">
			<input type="text" name="" placeholder="Gramos"><br>
			<p>Hidratos de carbono:</p><input type="text" name=""  placeholder="%">
			<input type="text" name="" placeholder="Kcal">
			<input type="text" name="" placeholder="Gramos"><br>
		</div>
		<h1>Equivalentes</h1>
		<div class="div3">
			<p>Frutas</p><input type="text" name="">
			<p>Verduras</p><input type="text" name="">
			<p>Leguminosas</p><input type="text" name="">
			<p>Cereales</p><input type="text" name=""><select>
				<option>Tipo</option>
			</select>
			<p>AOA</p><input type="text" name=""><select>
				<option>Tipo</option>
			</select>
			<p>Lácteos</p><input type="text" name=""><select>
				<option>Tipo</option>
			</select><br>
			<p>Aceites y grasas</p><input type="text" name=""><select>
				<option>Tipo</option>
			</select>
			<p>Azúcares</p><input type="text" name=""><select>
				<option>Tipo</option>
			</select>
		</div>
		<div class="div4">
			<input type="text" name="" placeholder="Objetivos">
			<input type="" name="" placeholder="Metas">
			<input type="submit" name="">
		</div>
	</form>

</body>
</html>