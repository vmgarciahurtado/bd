<?PHP
include 'conexion.php';

$json=array();
$query = "SELECT tiponaturaleza FROM entorno";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	//echo $row[0]."<br>";
	$result["entorno"]= $row[0];
	$json['entorno'][]=$result;
}
echo json_encode($json)
?>