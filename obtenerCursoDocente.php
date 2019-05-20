<?PHP
include 'conexion.php';

//$docente=$_POST["docente_iddocente"];
$json=array();
$docente= "123";

$query = "SELECT nombrecurso
FROM curso where docente_iddocente='$docente'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["nombreCurso"]= $row[0];
	$json['cursos'][]=$result;
}
echo json_encode($json)

?>
