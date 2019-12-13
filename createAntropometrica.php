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
		$Glucosa=$_POST['Glucosa'];
		$ColesterolTotal=$_POST['ColesterolTotal'];
		$ldl=$_POST['ldl'];
		$hdl=$_POST['hdl'];
		$Clinicacol=$_POST['Clinicacol'];
		$trigliceridos=$_POST['trigliceridos'];
		$microalbuminuria=$_POST['microalbuminuria'];
		$Expediente_clave=$_POST['Expediente_clave'];
		$imagen=$_POST['imagen'];

			$consulta = "INSERT INTO bioquimica(Glucosa, ColesterolTotal, ldl, hdl, Clinicacol, trigliceridos, microalbuminuria, Expediente_clave, imagen) VALUES('$Glucosa',  '$ColesterolTotal', '$ldl', '$hdl',  '$Clinicacol', '$trigliceridos',  '$microalbuminuria', '$Expediente_clave', 'imagen')";
    		mysqli_query($con, $consulta);
	}

	

?>