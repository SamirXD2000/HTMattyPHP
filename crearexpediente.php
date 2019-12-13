<?php

	session_start();
	include('database.php');
	if (!isset($_SESSION["usuario"])) 
	{
    	header("Location: index.php");
    	exit();
	}


	if(isset($_POST['guardar']))
	{
		$clave=$_POST['clave'];
		$nombre=$_POST['nombre'];
		$Apellidos=$_POST['Apellidos'];
		$fechaNacimiento=$_POST['fechaNacimiento'];
		$edad=$_POST['edad'];
		$telefono=$_POST['telefono'];
		$sexo=$_POST['sexo'];
		$correo=$_POST['correo'];
		$motivo=$_POST['motivo'];
		$antPadre=$_POST['antPadre'];
		$antMadre=$_POST['antMadre'];
		$antHermano=$_POST['antHermano'];
		$antAbueloMat=$_POST['antAbueloMat'];
		$antAbuelaMat=$_POST['antAbuelaMat'];
		$antAbueloPat=$_POST['antAbueloPat'];
		$antAbuelaPat=$_POST['antAbuelaPat'];
		$antPersonales=$_POST['antPersonales'];
		$peso=$_POST['peso'];
		$pesoMax=$_POST['pesoMax'];
		$pesoMin=$_POST['pesoMin'];
		$consumoTabaco=$_POST['consumoTabaco'];
		$consumoAlcohol=$_POST['consumoAlcohol'];
		$cantidad=$_POST['cantidad'];
		$Frecuencia=$_POST['Frecuencia'];
		$tipo=$_POST['tipo'];
		$consumoCafe=$_POST['consumoCafe'];
		//$farmacos=$_POST['farmacos'];
		$horasSueno=$_POST['horasSueno'];
		$tipoPeriodoMenstrual=$_POST['tipoPeriodoMenstrual'];
		$fechaUltMenstruacion=$_POST['fechaUltMenstruacion'];
		$duracionCiclo=$_POST['duracionCiclo'];
		$tipoMenstruacion=$_POST['tipoMenstruacion'];
		$metodoAnticonceptivo=$_POST['metodoAnticonceptivo'];
		$numGestaciones=$_POST['numGestaciones'];
		$abortos=$_POST['abortos'];
		$cesareas=$_POST['cesareas'];
		$embarazo=$_POST['embarazo'];
		$pesoPregestacional=$_POST['pesoPregestacional'];
		$sdg=$_POST['sdg'];
		$Nutriologo_idNutriologo=$_POST['Nutriologo_idNutriologo'];

			$consulta = "INSERT INTO expediente(clave, nombre, Apellidos, fechaNacimiento, edad, telefono, sexo, correo, motivo, antPadre, antMadre, antHermano,antAbueloMat, antAbuelaMat, antAbueloPat, antAbuelaPat, antPersonales, peso, pesoMax, pesoMin, consumoTabaco, consumoAlcohol, cantidad, Frecuencia, tipo, consumoCafe, /*farmacos,*/ horasSueno, tipoPeriodoMenstrual, fechaUltMenstruacion, duracionCiclo, tipoMenstruacion, metodoAnticonceptivo, numGestaciones, abortos, cesareas, embarazo, pesoPregestacional, sdg, Nutriologo_idNutriologo) VALUES('$clave',  '$nombre', '$Apellidos',  '$fechaNacimiento',  '$edad', '$telefono',  '$sexo',  '$correo',  '$motivo',  '$antPadre',  '$antMadre',  '$antHermano',  '$antAbueloMat',  '$antAbuelaMat',  '$antAbueloPat',  '$antAbuelaPat',  '$antPersonales',  '$peso',  '$pesoMax',  '$pesoMin',  '$consumoTabaco',  '$consumoAlcohol',  '$cantidad',  '$Frecuencia',  '$tipo',  '$consumoCafe',  /*'$farmacos', */ '$horasSueno',  '$tipoPeriodoMenstrual',  '$fechaUltMenstruacion',  '$duracionCiclo',  '$tipoMenstruacion',  '$metodoAnticonceptivo',  '$numGestaciones',  '$abortos',  '$cesareas',  '$embarazo',  '$pesoPregestacional',  '$sdg',  '$Nutriologo_idNutriologo')";
    		mysqli_query($con, $consulta);
	}

	
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Expediente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Styles/styleexp.css">
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

	<form method="get" action="">
		<section class="gral">
			<p>Clave</p><input type="text" id="idnamesito" name="clave" >
			<p>idNutri</p><input type="text" id="idnamesito" name="Nutriologo_idNutriologo" >
			<p>Nombre</p><input type="text" id="idnamesito" name="nombre" >
			<p>Fecha de nacimiento</p><input type="date" id="fechaNacimiento" name="fechaNacimiento">
			<p>Edad</p><input type="text" id="idedad" name="edad">
			<br>
			<p>Apellidos</p><input type="text" id="idap" name="Apellidos">
			<p>Teléfono</p><input type="text" id="idnumber" name="telefono">
			<p>Sexo</p><select id="idsex" name="sexo">
				<option value="Hombre">Hombre</option>
				<option value="Mujer">Mujer</option>
			</select>
			<br>
			<p>E-mail</p><input type="text" name="email" id="idemail" name="email">
			<br>
			<input class="special" type="text" placeholder="Motivo de la consulta" name="motivo">
		</section>

		<h1>Antecedentes heredoFamiliares</h1>

		<section class="antecela">
			<p>Padre</p><select name='antPadre'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Obesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Madre</p><select name='antMadre'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Obesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Hermano</p><select name='antHermano'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Obesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuelo materno</p><select name='antAbueloMat'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Obesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuela materna</p><select name='antAbuelaMat'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Óbesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuelo paterno</p><select name='antAbueloPat'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Obesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p>Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuela materna</p><select name='antAbuelaMat'>
				<option value='Ninguna'>Ninguna</option>
				<option value='Obesidad'>Obesidad</option>
				<option value='Diabetes'>Diabetes</option>
				<option value='Hipertensión'>Hipertensión</option>
				<option value='Dislipidemias'>Dislipidemias</option>
				<option value='Renal'>Renal</option>
				<option value='Litiásis'>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">
		</section>

		<h1>Antecedentes personales patológicos</h1>

		<input class="antec" type="text" name="antPersonales" >

		<h1>Historia de peso</h1>

		<section class="pesohistory">
			<div class="subdiv1">
				<p>Peso habitual</p><input type="text" name="peso" > <br>
				<p>Peso máximo</p><input type="text" name="pesoMax" ><br>
				<p>Peso mínimo</p><input type="text" name="pesoMin" ><br>
			</div>
			<div class="subdiv2">
				<p>Intentos previos de pérdida de peso: (descripción, duración, resultados)</p>
				<input type="text" name="">
			</div>
		</section>

		<h1>Estilo de vida</h1>

		<section class="lifestyle">
			<h3>Consumo de tabaco</h3> <select name="consumoTabaco">
				<option value="No">No</option>
				<option value="Si">Sí</option>
			</select><br>

			<h3>Consumo de bebidas alcohólicas</h3> <select name="consumoAlcohol">
				<option value="No">No</option>
				<option value="Si">Sí</option>
			</select><br>

			<p>Cantidad </p><input type="text" placeholder="vasos" name="cantidad">
			<p>Frecuencia</p><input type="text" name="Frecuencia" >
			<p>Tipo</p><input type="text" name="tipo"><br>

			<!--<h3>Fármacos</h3><br>
			<input type="text" placeholder="Medicamento" name="Medicamento">
			<input type="text" placeholder="Función" name="farmacos">
			<input type="text" placeholder="Dosis" name="Dosis">
			<br>-->

			<h3>Horas de sueño</h3><input type="text" placeholder="hrs">

		</section>

		<h1>Antecedentes ginecobstétricos</h1>

		<section class="nao">
			<p>Tipo de periodo menstrual</p><select name="tipoPeriodoMenstrual">
				<option value="Irregular">Irregular</option>
				<option value="Regular">Regular</option>
			</select>
			<p>Fecha de última menstruación</p><input type="date" name="fechaUltMenstruacion"> <p>Duración del ciclo</p> <input type="text" name="duracionCiclo" ><br>
			<input type="checkbox" class="checki"><p>Amenorrea</p> <input class="checki" type="checkbox"><p>Dismenorrea</p> <input type="checkbox" class="checki"> <p>Oligomenorrea</p><br>
			<p>Método anti-conceptivo</p> <input type="text" name="metodoAnticonceptivo" >
			<p>Número de gestaciones</p> <input type="text" name="numGestaciones">
			<p>Abortos</p> <input type="text" name="abortos">
			<p>Cesáreas</p> <input type="text" name="cesareas"><br>
			<p>Embarazo</p> <input type="text" name="embarazo">
			<p>Peso pregestacional</p> <input type="text" name="pesoPregestacional">
			<p>SDG</p> <input type="text" name="sdg"><br>
			<a href="create_diagnostico.php"><button>Guardar</a></button>

		</section>
	</form>


</body>
</html>