<?PHP
include 'conexion.php';

$json=array();
$docente=$_REQUEST["docente"];

$query = "SELECT nombrecurso, idcurso
FROM curso where docente_iddocente='$docente'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["nombreCurso"]= $row[0];
	$result["idcurso"]=$row[1];
	$json['cursos'][]=$result;
}
echo json_encode($json)

?>
