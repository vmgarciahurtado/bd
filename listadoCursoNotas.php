<?PHP
include 'conexion.php';

//$docente=$_POST["docente_iddocente"];
$json=array();
$docente= "2";

$query = "SELECT c.nombrecurso, e.nombreestudiante, d.nombredocente, ct.nombrecorte, sc.definitivacorte
FROM Curso c JOIN estudiantes_curso ec ON(ec.curso_idcurso=c.idcurso)
JOIN estudiante e ON(e.codigoestudiante=ec.estudiante_codigoestudiante)
JOIN materia m ON(c.materia_idmateria=m.idmateria)
JOIN docente d ON(d.iddocente=c.docente_iddocente)
JOIN seguimiento s ON(s.curso_idcurso=c.idcurso)
JOIN seguimiento_corte sc ON(sc.idSeguimientocorte=s.seg_corte_idsegcorte)
JOIN corte ct ON(sc.corte_idcorte=ct.idcorte) WHERE d.iddocente='$docente'";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);


while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["nombreCurso"]= $row[0];
    $result["estudiante"]=$row[1]:
    $result["docente"]=$row[2];
    $result["corte"]=$row[3];
    $result["definitiva"]=$row[4];
	$json['cursosNotas'][]=$result;
}
echo json_encode($json)

?>