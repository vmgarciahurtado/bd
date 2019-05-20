<?PHP
include 'conexion.php';

$json=array();
$query = "SELECT nombredocente,iddocente FROM Docente";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	//echo $row[0]."<br>";
	$result["nombre"]= $row[0];
	$result["id"]= $row[1];
	$json['docente'][]=$result;
}
echo json_encode($json)
?>