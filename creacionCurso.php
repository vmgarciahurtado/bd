<?PHP
include 'conexion.php';


	$nombrecurso=$_POST["nombrecurso"];
	$anoencurso=$_POST["anoencurso"];
	$materia_idmateria=$_POST["materia_idmateria"];
	$docente_iddocente=$_POST["docente_iddocente"];
	$diacurso = $_POST["diacurso"];
	$horainiciocurso = $_POST["horainiciocurso"];
	$horafincurso = $_POST["horafincurso"];

	$agregar = oci_parse($conexion,"INSERT INTO curso VALUES ('$nombrecurso','$anoencurso', '$materia_idmateria', '$docente_iddocente','$diacurso','$horainiciocurso','$horafincurso')");

	if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>