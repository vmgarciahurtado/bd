<?PHP
include 'conexion.php';

/*$CodigoEstudiante=$_POST["CodigoEstudiante"];*/

$json=array();
$CodigoEstudiante= "12345";

$query = "SELECT sc.Corte_IdCorte, sc.DefinitivaCorte, e.nombreestudiante, c.nombrecurso
FROM seguimiento_corte sc JOIN seguimiento s ON (sc.idseguimientocorte=s.seg_corte_idsegcorte)
JOIN estudiante e ON(e.codigoestudiante=s.estudiante_codigoestudiante)
JOIN curso c ON(s.curso_idcurso=c.idcurso) WHERE s.estudiante_codigoestudiante='$CodigoEstudiante';

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["corte"]= $row[0];
	$result["definitiva"]= $row[1];
	$result["nombre"]= $row[2];
	$result["nombrecurso"]=$row[3];
	$json['notas'][]=$result;
}
echo json_encode($json)

?>
