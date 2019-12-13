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


    /*$consultaCita = "SELECT m.nombre AS 'medico', p.nombre AS 'paciente', c.fecha_cita AS 'fecha', c.hora_cita AS 'hora'
                    FROM medico m
                    INNER JOIN cita c ON m.idMedico = c.idMedico
                    INNER JOIN paciente p ON c.idPaciente = p.idPaciente";*/

    $consultaCita = "SELECT nombre, fechaNacimiento, edad, Apellidos, telefono, correo, motivo, antPersonales, peso, pesoMax, pesoMin, cantidad, Frecuencia, tipo, horasSueno, fechaUltMenstruacion, duracionCiclo, metodoAnticonceptivo, numGestaciones, abortos, cesareas, embarazo, pesoPrestagecional, sdg FROM expediente where clave = $expediente_clave";
    $pacienteQ = mysqli_query($con, $consultaCita);
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
<?php

    $consultaCita = "SELECT nombre, fechaNacimiento, edad, Apellidos, telefono, correo, motivo, antPersonales, peso, pesoMax, pesoMin, cantidad, Frecuencia, tipo, horasSueno, fechaUltMenstruacion, duracionCiclo, metodoAnticonceptivo, numGestaciones, abortos, cesareas, embarazo, pesoPrestagecional, sdg FROM expediente where clave = $expediente_clave";
    $pacienteQ = mysqli_query($con, $consultaCita);


                    while ($row = mysqli_fetch_array($pacienteQ)) {
                      echo "<tr>";
                      echo "<td>".$row['nombre']."</td>";
                      echo "<td>".$row['fechaNacimiento']."</td>";
                      echo "<td>".$row['edad']."</td>";
                      echo "<td>".$row['Apellidos']."</td>";
                      echo "<td>".$row['telefono']."</td>";
                      echo "<td>".$row['correo']."</td>";
                      echo "<td>".$row['motivo']."</td>";
                      echo "<td>".$row['antPersonales']."</td>";
                      echo "<td>".$row['peso']."</td>";
                      echo "<td>".$row['pesoMax']."</td>";
                      echo "<td>".$row['pesoMin']."</td>";
                      echo "<td>".$row['cantidad']."</td>";
                      echo "<td>".$row['Frecuencia']."</td>";
                      echo "<td>".$row['tipo']."</td>";
                      echo "<td>".$row['farmacos']."</td>";
                      echo "<td>".$row['horasSueno']."</td>";
                      echo "<td>".$row['fechaUltMenstruacion']."</td>";
                      echo "<td>".$row['duracionCiclo']."</td>";
                      echo "<td>".$row['metodoAnticonceptivo']."</td>";
                      echo "<td>".$row['numGestaciones']."</td>";
                      echo "<td>".$row['abortos']."</td>";
                      echo "<td>".$row['cesareas']."</td>";
                      echo "<td>".$row['embarazo']."</td>";
                      echo "<td>".$row['pesoPrestagecional']."</td>";
                      echo "<td>".$row['sdg']."</td>";
                      echo "</tr>";
?>
	<form method="get" action="expediente.php">
		<section class="gral">
			<p>Nombre</p><input type="text" id="idnamesito" name="name" value="<?php echo $row ['nombre']; ?> ">
			<p>Fecha de nacimiento</p><input type="date" id="ididdate" value="<?php echo $row ['fechaNacimiento']; ?> ">
			<p>Edad</p><input type="text" id="idedad" value="<?php echo $row ['edad']; ?> ">
			<br>
			<p>Apellidos</p><input type="text" id="idap" value="<?php echo $row ['Apellidos']; ?> ">
			<p>Teléfono</p><input type="text" id="idnumber" value="<?php echo $row ['telefono']; ?> ">
			<p>Sexo</p><select id="idsex">
				<option value="h">Hombre</option>
				<option value="m">Mujer</option>
			</select>
			<br>
			<p>E-mail</p><input type="text" name="email" id="idemail" value="<?php echo $row ['correo']; ?> ">
			<br>
			<input class="special" type="text" placeholder="Motivo de la consulta" value="<?php echo $row ['motivo']; ?> ">
		</section>

		<h1>Antecedentes heredoFamiliares</h1>

		<section class="antecela">
			<p>Padre</p><select>
				<option>Ninguna</option>
				<option>Obesidad</option>
				<option>Diabetes</option>
				<option>Hipertensión</option>
				<option>Dislipidemias</option>
				<option>Renal</option>
				<option>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Madre</p><select>
				<option>Ninguna</option>
				<option>Obesidad</option>
				<option>Diabetes</option>
				<option>Hipertensión</option>
				<option>Dislipidemias</option>
				<option>Renal</option>
				<option>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Hermano</p><select>
				<option>Ninguna</option>
				<option>Obesidad</option>
				<option>Diabetes</option>
				<option>Hipertensión</option>
				<option>Dislipidemias</option>
				<option>Renal</option>
				<option>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuelo materno</p><select>
				<option>Leucemia</option>
				<option>Diabetes</option>
				<option>Cáncer</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuela materna</p><select>
				<option>Ninguna</option>
				<option>Obesidad</option>
				<option>Diabetes</option>
				<option>Hipertensión</option>
				<option>Dislipidemias</option>
				<option>Renal</option>
				<option>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuelo paterno</p><select>
				<option>Leucemia</option>
				<option>Diabetes</option>
				<option>Cáncer</option>
			</select> <br>
			<p>Otros</p> <input type="text" placeholder="(Separar por comas)">

			<p>Abuela materna</p><select>
				<option>Ninguna</option>
				<option>Obesidad</option>
				<option>Diabetes</option>
				<option>Hipertensión</option>
				<option>Dislipidemias</option>
				<option>Renal</option>
				<option>Litiásis</option>
			</select> <br>
			<p class="otros">Otros</p> <input type="text" placeholder="(Separar por comas)">
		</section>

		<h1>Antecedentes personales patológicos</h1>

		<input class="antec" type="text" value="<?php echo $row ['antPersonales']; ?> ">

		<h1>Historia de peso</h1>

		<section class="pesohistory">
			<div class="subdiv1">
				<p>Peso habitual</p><input type="text" name="" value="<?php echo $row ['peso']; ?> "> <br>
				<p>Peso máximo</p><input type="text" name="" value="<?php echo $row ['pesoMax']; ?> "><br>
				<p>Peso mínimo</p><input type="text" name="" value="<?php echo $row ['pesoMin']; ?> "><br>
			</div>
			<div class="subdiv2">
				<p>Intentos previos de pérdida de peso: (descripción, duración, resultados)</p>
				<input type="text" >
			</div>
		</section>

		<h1>Estilo de vida</h1>

		<section class="lifestyle">
			<h3>Consumo de tabaco</h3> <select>
				<option>No</option>
				<option>Sí</option>
			</select><br>

			<h3>Consumo de bebidas alcohólicas</h3> <select>
				<option>No</option>
				<option>Sí</option>
			</select><br>

			<p>Cantidad</p><input type="number" placeholder="vasos" value="<?php echo $row ['cantidad']; ?> ">
			<p>Frecuencia</p><input type="text" value="<?php echo $row ['Frecuencia']; ?> ">
			<p>Tipo</p><input type="text" value="<?php echo $row ['tipo']; ?> "><br>

			<h3>Fármacos</h3><br>
			<input type="text" placeholder="Medicamento" value="<?php echo $row ['farmacos']; ?> ">
			<input type="text" placeholder="Función">
			<input type="text" placeholder="Dosis">
			<br>

			<h3>Horas de sueño</h3><input type="text" placeholder="hrs" value="<?php echo $row ['horasSueno']; ?> ">

		</section>

		<h1>Antecedentes ginecobstétricos</h1>

		<section class="nao">
			<p>Tipo de periodo menstrual</p><select>
				<option>Irregular</option>
				<option>Regular</option>
			</select>
			<p>Fecha de última menstruación</p><input type="date" value="<?php echo $row ['fechaUltMenstruacion']; ?> "> <p>Duración del ciclo</p> <input type="text" value="<?php echo $row ['duracionCiclo']; ?> "><br>
			<input type="checkbox" class="checki"><p>Amenorrea</p> <input class="checki" type="checkbox"><p>Dismenorrea</p> <input type="checkbox" class="checki"> <p>Oligomenorrea</p><br>
			<p>Método anti-conceptivo</p> <input type="text" name="" value="<?php echo $row ['metodoAnticonceptivo']; ?> ">
			<p>Número de gestaciones</p> <input type="text" value="<?php echo $row ['numGestaciones']; ?> ">
			<p>Abortos</p> <input type="text" value="<?php echo $row ['abortos']; ?> ">
			<p>Cesáreas</p> <input type="text" value="<?php echo $row ['cesareas']; ?> "><br>
			<p>Embarazo</p> <input type="text" value="<?php echo $row ['embarazo']; ?> ">
			<p>Peso pregestacional</p> <input type="text" value="<?php echo $row ['pesoPrestagecional']; ?> ">
			<p>SDG</p> <input type="text" value="<?php echo $row ['sdg']; ?> "><br>
			<button>Confirmar</button>

		</section>
	</form>
	<?php
                    }
	?>


</body>
</html>