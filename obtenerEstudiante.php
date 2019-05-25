<?PHP
include 'conexion.php';

<<<<<<< HEAD
$codigoEstudiante=$_REQUES["codigoEstudiante"]
=======
$codigoEstudiante=$_REQUEST["codigoEstudiante"];
>>>>>>> 7c41a1019b052d4211f0fa5f05f4b1d0af307712
$json=array();

$query = "SELECT codigoEstudiante, cedulaestudiante, nombreestudiante, fechanacimiento, estadoestudiante, 
direccionestudiante, telefonoestudiante, correoelectronico, pacademico_idpacademico, semestre_numerosemestre 
FROM estudiante WHERE codigoEstudiante='$codigoEstudiante'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["codigo"]= $row[0];
    $result["cedula"]= $row[1];
    $result["nombre"]= $row[2];
    $result["fecha"]= $row[3];
    $result["estado"]= $row[4];
    $result["direccion"]= $row[5];
    $result["telefono"]= $row[6];
    $result["correo"]= $row[7];
    $result["programa"]= $row[8];
    $result["semestre"]= $row[9];
	$json['estudiantes'][]=$result;
}
echo json_encode($json)
?>