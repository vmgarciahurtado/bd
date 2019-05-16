<?PHP
include 'conexion.php';

/*$CodigoEstudiante=$_POST["CodigoEstudiante"];*/

$json=array();
$CodigoEstudiante= "12345";

$query = "SELECT sc.Corte_IdCorte, DefinitivaCorte,e.nombreestudiante
FROM Seguimiento_Corte sc JOIN Seguimiento s ON(sc.Seguimiento_IdSeguimiento=s.IdSeguimiento)
JOIN Seguimiento_Estudiante se ON(s.IdSeguimiento=se.Seguimiento_IdSeguimiento) 
JOIN estudiante e on (e.codigoestudiante = se.estudiante_codigoestudiante) WHERE
se.Estudiante_CodigoEstudiante=$CodigoEstudiante order by sc.corte_idcorte";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["corte"]= $row[0];
	$result["definitiva"]= $row[1];
	$result["nombre"]= $row[2];
	$json['notas'][]=$result;
}
echo json_encode($json)

?>
