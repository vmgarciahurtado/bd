<?PHP
include 'conexion.php';

$codigoestudiante=$_REQUEST["codigo"];
$json=array();

$query = "SELECT e.codigoEstudiante, e.cedulaestudiante, e.nombreestudiante, e.fechanacimiento, 
e.direccionestudiante, e.telefonoestudiante, e.correoelectronico
FROM estudiante e join programaacademico p on(e.pacademico_idpacademico = p.idprogramaacademico) WHERE codigoEstudiante='$codigoestudiante'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["codigo"]= $row[0];
    $result["cedula"]= $row[1];
    $result["nombre"]= $row[2];
    $result["fecha"]= $row[3];
    $result["direccion"]= $row[4];
    $result["telefono"]= $row[5];
    $result["correo"]= $row[6];
	$json['estudiantes'][]=$result;
}
echo json_encode($json)
?>