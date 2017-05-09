<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <link href = 'https://fonts.googleapis.com/css?family=Roboto:400,100' rel = 'stylesheet' type = 'text/css'>
	    <link href = "css.css" rel="stylesheet">

		<title>Iniciar juego</title>
	</head>

	<?php
		$user = 'root';
		$password = '';
		$db = 'ProgWeb';
		$db = new mysqli('localhost', $user, $password, $db) or die("No se pudo conectar");
	?>

	<body>
		<h1>Antes de empezar...</h1>
		<div class = "div_Descripcion">
			<h2>Descripción del juego:</h2>
			<p>Este es un juego de aventura de texto, lo que significa que toda la jugabilidad va a ser mediante texto (En este caso yo agregue imágenes para que sea un poco mas visual.) La historia, acciones y personajes se van a contar con texto, al igual que toda la interacción por parte del usuario va a ser igualmente por texto, en la próxima ventana se muestran los comandos disponibles a utilizar, y pueden ser utilizados con cualquier objeto con un resplandor azul para recibir retroalimentación de lo que se puede o no se puede hacer. Espero les guste el juego.</p>
			<p>Para empezar, si me puedes proporcionar tu nombre para mantener un registro de personas que han jugado el juego. Si gustas permanecer anónimo también es valido.</p>
		</div>

		<form action = "inicio.php" method = "post">
			<h3>¿Cual es tu nombre?</h3>
			<input type = "text" name = "nombre" autocomplete = "off" autofocus>
			<br> <br>
			<button type = "submit" name = "Submit" onclick = "return btn_Submit()">Ingresar</button>
			<br> <br>
		</form>
	</body>

	<?php
		if(isset($_POST['Submit']))
		{
			$Nombre = $_POST['nombre'];

			$sql = "INSERT INTO evidencia (ID, Nombre) VALUES (NULL, '$Nombre')";

			if(!mysqli_query($db, $sql))
			{
				echo "No se pudo insertar";
			}
			else
			{
				echo "Insertado!";
				?>
				<script language="javascript" type="text/javascript">
					   window.location.href = "index.html";
				</script>
				<?php
			}
		}
	?>
</html>