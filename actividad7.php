<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8"/>
		<title>Actividad 7 - Programacion Web</title>
	</head>

	<?php
		$user = 'root';
		$password = '';
		$db = 'ProgWeb';
		$db = new mysqli('localhost', $user, $password, $db) or die("No se pudo conectar");
	?>

	<body onLoad = "document.myform.nombre.focus();">
		<div name = "Insert">
			<form action = "actividad7.php" method = "post">
				Usuario: <input type = "text" name = "Usuario"> 
				<br><br>
				<input type = "radio" name = "Genero" value = "Masculino"> Masculino 
				<input type = "radio" name = "Genero" value = "Femenino"> Femenino
				<br><br>
				Color favorito: <input type = "color" name = "Color">
				<br><br>
				Comida favorita: <input type = "text" name = "Comida">
				<br><br>
				<input type = "submit" name = "Submit" value = "Insertar">
			</form>

			<?php
				if(isset($_POST['Submit']))
				{
					$Usuario = $_POST['Usuario'];
					$Genero = $_POST['Genero'];
					$Color = $_POST['Color'];
					$Comida = $_POST['Comida'];

					$sql = "INSERT INTO actividad7 (user_name, gender, favorite_color, favorite_food)
					VALUES ('$Usuario', '$Genero', '$Color', '$Comida')";

					if(!mysqli_query($db, $sql))
					{
						echo "No se pudo insertar";
					}
					else
					{
						echo "Insertado!";
					}
				}
			?>
		</div>
		<br>
		<div name = "Consult">
			<table>
				<th><a href = "?orderBy=ID">ID</a></th>
				<th><a href = "?orderBy=user_name">Usuario</a></th>
				<th><a href = "?orderBy=gender">Genero</a></th>
				<th><a href = "?orderBy=favorite_color">Color Favorito</a></th>
				<th><a href = "?orderBy=favorite_food">Comida Favorita</a></th>

				<?php
					$orderBy = array('ID', 'user_name', 'gender', 'favorite_color', 'favorite_food');
					$order = "ID";

					if(isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy))
					{
						$order = $_GET['orderBy'];
					}

					$sql = "SELECT * FROM actividad7 ORDER BY " . $order;
					$query = mysqli_query($db, $sql);

					while($result = mysqli_fetch_assoc($query))
					{
						echo "<tr>";
						echo "<td>" . $result['ID'] . "</td>";
						echo "<td>" . $result['user_name'] . "</td>";
						echo "<td>" . $result['gender'] . "</td>";
						echo "<td>" . "<input type = 'color' name = 'Color' value = " . $result['favorite_color'] . ">"  . "</td>";
						echo "<td>" . $result['favorite_food'] . "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
	<style>
		body
		{
	        text-align: center;
	        padding: 2%;
	        font-family: 'Roboto', sans-serif;
		}
		table
		{
			padding: 1%;
			display: inline-block;
			border-collapse: collapse;
		}
		th, td 
		{
		   border: 1px solid black;
		}
		th
		{
			background-color: rgb(150, 220, 100);
			height: 50px;
			width: 150px;
		}
		input[name = "Submit"]:hover, input[name = "Color"]:hover, input[name = "Genero"]:hover
		{
			cursor: pointer;
		}
	</style>
</html>