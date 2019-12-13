<?php

include_once 'database.php';


session_start();
if(isset($_GET['clave']))
{
	$clave=$_GET['clave'];
	/*
	$clave=$_GET['clave'];
	$delete=$con->prepare('DELETE FROM expediente WHERE clave=$clave');
	$delete->execute(array(
		':clave'=>$clave
	));
	header('Location: index2.php');
	*/
	$consultaDelete= "DELETE FROM expediente WHERE clave=$clave";
	$delete=mysqli_query($con, $consultaDelete);
	header('Location: index2.php');

	
}


//$user_name = $_SESSION['user_name'] ?? '';

 


?>