<?PHP
include 'conexion.php';

$CodigoEstudiante=$_POST["CodigoEstudiante"];

    $consultar = oci_parse($conexion,"SELECT sc.Corte_IdCorte, DefinitivaCorte
    FROM Seguimiento_Corte sc JOIN Seguimiento s ON(sc.Seguimiento_IdSeguimiento=s.IdSeguimiento)
    JOIN Seguimiento_Estudiante se ON(s.IdSeguimiento=se.Seguimiento_IdSeguimiento) WHERE
    se.Estudiante_CodigoEstudiante=$CodigoEstudiante");
	 if(oci_execute($consultar)){
		echo "consultó";
	}else{
		echo "noConsultó";
	} 
?>
