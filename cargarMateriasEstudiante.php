<?PHP
include 'conexion.php';


$json=array();
$codigoEstudiante=$_REQUEST["estudiante"];

$query = "SELECT m.idmateria, m.nombremateria FROM estudiante e JOIN programaacademico pa 
ON(pa.idprogramaacademico=e.pacademico_idpacademico) join materiaprogramaacademico mpa 
ON(mpa.pa_idpacademico=pa.idprogramaacademico)
JOIN materia m ON(m.idmateria=mpa.materia_idmateria) WHERE e.codigoestudiante='$codigoEstudiante'";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["idmateria"]= $row[0];
    $result["nombremateria"]= $row[1];
	$json['materias'][]=$result;
}
echo json_encode($json)
?>