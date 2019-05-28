<?PHP
include 'conexion.php';

$json=array();
$codigoDocente=$_REQUEST["docente"];
$dia=$_REQUEST["dia"];

$query = "SELECT c.nombrecurso||'-'||c.horainiciocurso||'-'||c.horafincurso
FROM curso c JOIN docente d ON(c.docente_iddocente=d.iddocente)
JOIN materia m ON(m.idmateria=c.materia_idmateria)
WHERE d.iddocente='$codigoDocente' and c.diacurso='$dia'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["horario"]= $row[0];
    $json['horarioDocente'][]=$result;
}
echo json_encode($json)

?>