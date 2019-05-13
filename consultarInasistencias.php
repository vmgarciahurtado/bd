<?PHP
include 'conexion.php';

$CodigoEstudiante=$_POST["CodigoEstudiante"];

    $consultar = oci_parse($conexion,"SELECT c.NombreCurso, ec.fallasEstudiante
    FROM Curso c JOIN Estudiantes_Curso ec ON(ec.Curso_IdCurso=c.IdCurso) JOIN Estudiante e ON
    (ec.IdEstudiante_Curso=e.CodigoEstudiante) WHERE ec.Estudiante_CodigoEstudiante=$CodigoEstudiante");
	 if(oci_execute($consultar)){
		echo "consultó";
	}else{
		echo "noConsultó";
	} 
?>

