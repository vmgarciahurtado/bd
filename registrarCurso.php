<?PHP
include 'conexion.php';

$idcurso=$_POST["idcurso"];
$nombrecurso=$_POST["nombrecurso"];
$anoencurso=$_POST["anoencurso"];
$materia_idmateria=$_POST["materia_idmateria"];
$docente_iddocente=$_POST["docente_iddocente"];

	$agregar = oci_parse($conexion,"INSERT INTO curso VALUES ('$idcurso','$nombrecurso','$anoencurso', '$materia_idmateria', '$docente_iddocente')");

	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>