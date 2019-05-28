<?PHP
include 'conexion.php';

$json=array();
$curso= $_REQUEST["curso"];

$query = "SELECT c.idcurso, c.nombrecurso, e.codigoestudiante, e.nombreestudiante
FROM estudiante e JOIN estudiantes_curso ec ON(ec.estudiante_codigoestudiante=e.codigoestudiante)
JOIN curso c ON(c.idcurso=ec.curso_idcurso) WHERE ec.curso_idcurso='$curso'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["idcurso"]= $row[0];
    $result["nombrecurso"]=$row[1];
    $result["codigoestudiante"]=$row[2];
    $result["estudiante"]=$row[3];
	$json['estudiantecurso'][]=$result;
}
echo json_encode($json)

?>
