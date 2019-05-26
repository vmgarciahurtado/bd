<?PHP
include 'conexion.php';


$json=array();
$codigoEstudiante=$_REQUEST["estudiante"];

$query = "SELECT m.idmateria, m.nombremateria
FROM estudiante e JOIN estadomateria em JOIN materia m ON(m.idmateria=em.materia_idmateria) JOIN materiaprogramaacademico mp ON(mp.materia_idmateria=m.idmateria)
 WHERE e.pacademico_idpacademico=mp.pa_idpacademico AND em.estudiante_codigoestudiante=";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["idmateria"]= $row[0];
    $result["nombremateria"]= $row[0];
	$json['materias'][]=$result;
}
echo json_encode($json)
?>