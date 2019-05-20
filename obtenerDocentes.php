<?PHP
include 'conexion.php';

$iddocente=$_POST["iddocente"]
$json=array();

$query = "SELECT iddocente, nombredocente, tipodocente_idtipodocente, estadodocente 
FROM docente WHERE iddocente='$iddocente'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["iddocente"]= $row[0];
    $result["nombre"]= $row[1];
    $result["tipo"]= $row[2];
    $result["estado"]= $row[3];
	$json['estudiantes'][]=$result;
}
echo json_encode($json)
?>