<?PHP
include 'conexion.php';

//$codigoDocente=$_POST["iddocente"];

$json=array();
$codigoDocente= "123";

$query = "SELECT c.nombrecurso, c.diacurso, c.horainiciocurso, c.horafincurso, m.nombremateria
FROM curso c JOIN docente d ON(c.docente_iddocente=d.iddocente)
JOIN materia m ON(m.idmateria=c.materia_idmateria)
WHERE d.iddocente='$codigoDocente'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["nombrecurso"]= $row[0];
	$result["diacurso"]= $row[1];
	$result["horainicio"]=$row[2];
	$result["horafin"]=$row[3];
	$result["materia"]=$row[4];
    $json['horarioDocente'][]=$result;
}
echo json_encode($json)

?>