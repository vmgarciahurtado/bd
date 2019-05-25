<?PHP
include 'conexion.php';

$json=array();

$materia = $_REQUEST["materia_idmateria"];
$estudiante = $_REQUEST["estudiante_codigoestudiante"];

$query = "SELECT m.nombremateria, d.nombredocente, c.diacurso, c.horainiciocurso, c.horafincurso, c.nombrecorte, sc.inasistencia  
FROM materia m JOIN curso c ON(m.idmateria=c.materia_idmateria) JOIN seguimiento s ON(s.curso_idcurso=c.idcurso)
JOIN seguimiento_corte sc ON(sc.idseguimientocorte=s.seg_corte_idsegcorte) JOIN docente d(d.iddocente=c.docente_iddocente)
JOIN corte ct ON(ct.idcorte=sc.corte_idcorte) 
WHERE c.materia_idmateria='$materia' and s.estudiante_codigoestudiante='$estudiante'";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["materia"]= $row[0];
	$result["docente"]= $row[1];
	$result["dia"]= $row[2];
	$result["horaI"]= $row[3];
	$result["horaF"]= $row[4];
	$result["corte"]= $row[5];
	$result["fallas"]= $row[6];
	$json['materia'][]=$result;
}
echo json_encode($json)
?>