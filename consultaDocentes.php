<?PHP
include 'conexion.php';

$json=array();
$query = "SELECT NombreDocente FROM Docente";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	//echo $row[0]."<br>";
	$result["docente"]= $row[0];
	$json['docente'][]=$result;
}
echo json_encode($json)
?>