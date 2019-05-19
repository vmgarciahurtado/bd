<?PHP
include 'conexion.php';

/*$CodigoEstudiante=$_POST["CodigoEstudiante"];*/

$json=array();
$CodigoEstudiante= "12345";

$query = "SELECT c.nombrecurso, m.nombremateria, c.diacurso, c.horainiciocurso, c.horafincurso
FROM estudiante e JOIN estudiantes_curso ec ON(ec.estudiante_codigoestudiante=e.codigoestudiante)
JOIN curso c ON(c.idcurso=ec.idestudiante_curso) 
JOIN materia m ON(m.idmateria=materia_idmateria) WHERE estudiante_codigoEstudiante='$CodigoEstudiante'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["nombrecurso"]= $row[0];
	$result["nombremateria"]= $row[1];
	$result["dia"]= $row[2];
	$result["horainicio"]=$row[3];
    $result["horafin"]=$row[4];
    $json['horario'][]=$result;
}
echo json_encode($json)

?>
