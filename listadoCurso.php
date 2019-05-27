<?PHP
include 'conexion.php';

//$docente=$_POST["docente_iddocente"];
$json=array();
$docente= "1";

$query = "SELECT c.nombrecurso, e.nombreestudiante, d.nombredocente
FROM Curso c JOIN estudiantes_curso ec ON(ec.curso_idcurso=c.idcurso)
JOIN estudiante e ON(e.codigoestudiante=ec.estudiante_codigoestudiante)
JOIN materia m ON(c.materia_idmateria=m.idmateria)
JOIN docente d ON(d.iddocente=docente_iddocente) WHERE d.iddocente='$docente'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["nombreCurso"]= $row[0];
    $result["estudiante"]=$row[1];
    $result["nombreestudiante"]=$row[1];
    $result["docente"]=$row[2];
	$json['cursos'][]=$result;
}
echo json_encode($json)

?>
