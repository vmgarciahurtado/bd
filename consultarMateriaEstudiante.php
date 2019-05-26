<?PHP
include 'conexion.php';

$json=array();
$json2=array();


$materia = $_REQUEST["idmateria"];
$estudiante = $_REQUEST["codigo"];

$query = "SELECT m.nombremateria, d.nombredocente, c.diacurso||'-'||c.horainiciocurso||'-'|| c.horafincurso, ct.nombrecorte ||': '||sc.definitivacorte, sc.inasistencia
FROM materia m JOIN curso c ON(m.idmateria=c.materia_idmateria) JOIN seguimiento s ON(s.curso_idcurso=c.idcurso)
JOIN seguimiento_corte sc ON(sc.idseguimientocorte=s.seg_corte_idsegcorte) JOIN docente d on(d.iddocente=c.docente_iddocente)
JOIN corte ct ON(ct.idcorte=sc.corte_idcorte)
WHERE c.materia_idmateria='$materia' and s.estudiante_codigoestudiante='$estudiante'";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

$query2 = "SELECT  m.nombremateria, ROUND(SUM(sc.definitivacorte)/3, 2)
FROM materia m JOIN curso c ON(m.idmateria=c.materia_idmateria) JOIN seguimiento s ON(s.curso_idcurso=c.idcurso)
JOIN seguimiento_corte sc ON(sc.idseguimientocorte=s.seg_corte_idsegcorte) JOIN docente d on(d.iddocente=c.docente_iddocente)
JOIN corte ct ON(ct.idcorte=sc.corte_idcorte) 
WHERE c.materia_idmateria='$materia' and s.estudiante_codigoestudiante='$estudiante' GROUP BY m.nombremateria";
$statement2 = oci_parse ($conexion, $query2);
oci_execute ($statement2);

while ($row1 = oci_fetch_array ($statement2, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result1["definitiva"]= $row1[1];
	$json2['promedio'][]=$result1;
}


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
	$result["materia"]= $row[0];
	$result["docente"]= $row[1];
	$result["horario"]= $row[2];
	$result["notas"]= $row[3];
	$result["fallas"]= $row[4];
	$result["json"]= $result1;
	$json['materia'][]=$result;
}
//echo json_encode($json2);
echo json_encode($json)
?>