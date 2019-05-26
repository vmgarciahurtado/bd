<?PHP
include 'conexion.php';

$json=array();
$codigoEstudiante=$_REQUEST["codigo"];

$query = "SELECT m.idmateria, m.nombremateria
FROM materia m JOIN estadomateria em ON(em.materia_idmateria=m.idmateria)
WHERE em.estudiante_codigoestudiante='$codigoEstudiante' and em.tipoestado='1'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["codigo"]= $row[0];
    $result["nombre"]= $row[1];
	$json['materias'][]=$result;
}
echo json_encode($json)
?>