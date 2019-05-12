<?PHP
include 'conexion.php';

$json=array();
$query = "SELECT NombreMateria FROM Materia";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	//echo $row[0]."<br>";
	$result["materia"]= $row[0];
	$json['materia'][]=$result;
}
echo json_encode($json)
?>