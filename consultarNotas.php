<?PHP
include 'conexion.php';

/*$CodigoEstudiante=$_POST["CodigoEstudiante"];*/

$json=array();
$CodigoEstudiante= "12345";

$query = "SELECT sc.corte_idcorte, sc.definitivacorte, c.nombrecurso, m.nombremateria
FROM seguimiento_corte sc JOIN seguimiento s ON(sc.idseguimientocorte=s.seg_corte_idsegcorte)
JOIN curso c ON(s.curso_idcurso=c.idcurso)
JOIN materia m ON(m.idmateria=c.materia_idmateria) WHERE s.estudiante_codigoestudiante='$CodigoEstudiante'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["corte"]= $row[0];
	$result["definitiva"]=$row[1];
	$result["curso"]=$row[2];
	$result["materia"]=$row[3];
	$json['notas'][]=$result;
}
echo json_encode($json)

?>
