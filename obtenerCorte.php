<?PHP
include 'conexion.php';

$json=array();

$query = "SELECT nombrecorte FROM corte";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["corte"]= $row[0];
	$json['cortes'][]=$result;
}
echo json_encode($json)

?>
