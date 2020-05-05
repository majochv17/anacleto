<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Ver registros</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<h1>Ver registros </h1>

<p><b>Ver registros </b> | <a href="ver-paginado.php">ver paginados</a></p>

<?php
// conexion a la base de datos
include('conecta-db.php');


// obtener los registros de la base de datos
if ($result = $mysqli->query("SELECT * FROM agenda ORDER BY id"))
{
	// muestra registros si hay registros para mostrar
	if ($result->num_rows > 0)
		{
				// mostrar registros en una tabla
				echo "<table border='1' cellpadding='10'>";

				// establecer encabezados de tabla
				echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Domicilio</th><th>Telefono</th><th>Email</th></tr>";

				while ($fila = $result->fetch_object())
					{
						
						// configurar un fila para cada registro
						echo "<tr>";
						echo "<td>" . $fila->id . "</td>";
						echo "<td>" . $fila->nombre . "</td>";
						echo "<td>" . $fila->apellido . "</td>";
						echo "<td>" . $fila->domicilio . "</td>";
						echo "<td>" . $fila->telefono . "</td>";
						echo "<td>" . $fila->email . "</td>";
						
						echo "<td><a href='editar.php?id=" . $fila->id . "'>Editar</a></td>";?>
						
						<td><a href='eliminar.php?id=<?php echo $fila->id ?> onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"'>Eliminar</a></td>";
						<?php
						echo "</tr>";
						
						
					}

				echo "</table>";
		}
	// si no hay registros en la base de datos, muestre un mensaje de alertae
	else
		{
			echo "No existen registros para mostrar!";
		}
}
// muestra un error si hay un problema con la consulta de la base de datos
else
	{
		echo "Error: " . $mysqli->error;
	}

// conexión de la base de datos
$mysqli->close();

?>

<a href="editar.php">Agregar nuevo registro</a>
<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>
</body>
</html>