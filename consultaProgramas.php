<?PHP
include 'conexion.php';
$json=array();
$id=$_REQUEST["id"];

$query = "SELECT nombreprograma,idprogramaacademico FROM programaacademico WHERE facultad_codigofacultad ='$id'";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["programa"]= $row[0];
	$result["id"]= $row[1];
	$json['programa'][]=$result;
}
echo json_encode($json)
?>

