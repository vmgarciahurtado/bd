<?php 

	include 'conexion.php';
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>CODIGO</td>
			<td>CEDULA</td>
			<td>NOMBRE</td>
			<td>DIRECCION</td>
			<td>TELEFONO</td>	
		</tr>

		<?php 

$query = "SELECT codigoestudiante,cedulaestudiante,nombreestudiante,direccionestudiante,telefonoestudiante from estudiante";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
		 ?>

		<tr>
			<td><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>
			<td><?php echo $row[2] ?></td>
			<td><?php echo $row[3] ?></td>
			<td><?php echo $row[4] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>