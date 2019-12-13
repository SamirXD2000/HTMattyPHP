<?php
	include_once 'database.php';

	if(isset($_POST['guardar']))
	{
		$Glucosa=$_POST['Glucosa'];
		$ColesterolTotal=$_POST['ColesterolTotal'];
		$ldl=$_POST['ldl'];
		$hdl=$_POST['hdl'];
		$Clinicacol=$_POST['Clinicacol'];
		$trigliceridos=$_POST['trigliceridos'];
		$microalbuminuria=$_POST['microalbuminuria'];
		$Expediente_clave=$_POST['Expediente_clave'];
		$imagen=$_POST['imagen'];

		if(!empty($Glucosa) && !empty($ColesterolTotal) && !empty($ldl) && !empty($hdl) && !empty($Clinicacol) && !empty($trigliceridos) && !empty($microalbuminuria) && !empty($Expediente_clave) && !empty($imagen))
		{
			$consulta_insert=$con->prepare('INSERT INTO bioquimica(Glucosa, ColesterolTotal, ldl, hdl, Clinicacol, trigliceridos, microalbuminuria, Expediente_clave, imagen) VALUES(:Glucosa, :ColesterolTotal, :ldl, :hdl, :Clinicacol, :trigliceridos, :microalbuminuria, :Expediente_clave, :imagen)
				');
			$consulta_insert->execute(array(
				':Glucosa' => $Glucosa,
				':Colesterol' => $Colesterol,
				':ldl' => $ldl,
				':hdl' => $hdl,
				':Clinicacol' => $Clinicacol,
				':trigliceridos' => $trigliceridos,
				':microalbuminuria' => $microalbuminuria,
				':Expediente_clave' => $Expediente_clave,
				':imagen' => $imagen
			));
			header('Location: index2.php');
		}
		else
		{
			echo "<script> alert('Está vacío... ves?);</script>";
		}

	}
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
		<img src="Images/loguito2.jpg">
		<div class="namesini">
			<h1>Nombre</h1>
		</div>
		
		<div class="contacto">
			<img src="Images/profile.png">
			<img src="Images/conf.svg">
		</div>
	</header>

    	<div class="mediciones">
			<p>Glucosa</p><input type="text" placeholder="Glucosa" id="idcintura" name="Glucosa">
			<p>Colesterol Total</p><input type="text" placeholder="Colesterol Total" id="idcadera" name="ColesterolTotal">
			<p>LDL</p><input type="text" placeholder="LDL" id="idbraquial" name="ldl">
			<p>HDL</p><input type="text" placeholder="HDL" id="idmuneca" name="hdl">
			<p>Clinica</p><input type="text" placeholder="Clinica" id="idmuneca" name="Clinicacol">
			<p>Triglicéridos</p><input type="text" placeholder="Triglicéridos" id="idbicipital" name="trigliceridos">
			<p>Microalbuminuria</p><input type="text" placeholder="Microalbuminuria" id="idtricipital" name="microalbuminuria">
			<p>Exp</p><input type="text" placeholder="Microalbuminuria" id="idtricipital" name="Expediente_clave">
			<p>Imagen</p><input type="text" placeholder="Microalbuminuria" id="idtricipital" name="imagen">
		</div>

		<h1>Ó</h1>

		<div class="upload">
			<input type="submit" name="guardar" value="submit">
		</div>


	<button>Confirmar</button>
</body>
</html>