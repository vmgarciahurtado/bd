<?PHP
include 'conexion.php';

$CodigoEstudiante=$_POST["CodigoEstudiante"];

    $consultar = oci_parse($conexion,"SELECT c.NombreCurso, sc.inasistencias
	FROM seguimiento_corte sc JOIN seguimiento s ON(sc.idseguimientocorte = s.seg_corte_idsegcorte)
	JOIN curso c ON(c.idcurso=s.curso_idcurso) WHERE s.estudiante_codigoestudiante='$CodigoEstudiante'");
	 
	 if(oci_execute($consultar)){
		echo "consulto";
	}else{
		echo "noConsulto";
	} 
?>

