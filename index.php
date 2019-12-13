<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="Styles/stylelogin.css">
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="div1">
		<img src="Images/loguito.jpg">
		<div class="divtext">
			<h2>Entra y vuelve tu vida fit más fácil, tanto si eres nutriólogo(a) o paciente.</h2>
		</div>
		
		<h1>Soy nutriólogo</h1>
		<form method="post" action="validar.php">
			<input type="text" class="txt" placeholder="id" id="user" name="usuario" >
			<input type="password" class="txt" placeholder="Password" id="password" name="clave"><br>
			<input type="submit" value="Ingresar"><a/>
		</form>

		<h1>Soy nuevo, quiero registrarme</h1>
		<button> <a href="registro.php">REGISTRARME</button></a>
	</div>
	
</body>
</html>