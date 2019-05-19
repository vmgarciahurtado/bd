<?PHP
include 'conexion.php';

$CodigoEstudiante=$_POST["CodigoEstudiante"];

    $consultar = oci_parse($conexion,"SELECT c.NombreCurso, sc.inasistencias
	FROM seguimiento_corte sc JOIN seguimiento s ON(sc.idseguimientocorte = s.seg_corte_idsegcorte)
	JOIN curso c ON(c.idcurso=s.curso_idcurso) WHERE s.estudiante_codigoestudiante='$CodigoEstudiante'");
	 
	 $statement = oci_parse ($conexion, $consultar);
	 oci_execute ($statement);
	 	 
	 while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
		 $result["nombreCurso"]= $row[0];
		 $result["inasistencias"]= $row[1];
		 $json['fallas'][]=$result;
	 }
	 echo json_encode($json)
?>

