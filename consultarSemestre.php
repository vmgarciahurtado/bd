<?PHP
include 'conexion.php';

$json=array();
$query = "SELECT nombreSemestre FROM semestre";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	//echo $row[0]."<br>";
	$result["nombre"]= $row[0];
	$json['semestre'][]=$result;
}
echo json_encode($json)
?>