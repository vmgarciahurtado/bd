<?PHP
include 'conexion.php';

/*$idcurso=$_POST["idcurso"];
$nombrecurso=$_POST["nombrecurso"];
$anoencurso=$_POST["anoencurso"];
$materia_idmateria=$_POST["materia_idmateria"];
$docente_iddocente=$_POST["docente_iddocente"];
$diacurso = $_POST["diacurso"];
$horainiciocurso = $_POST["horainiciocurso"];
$horafincurso = $_POST["horafincurso"];*/

$idcurso="1";
$nombrecurso="ingles";
$anoencurso="2019";
$materia_idmateria="1";
$docente_iddocente"1024";
$diacurso = "lunes";
$horainiciocurso = "08:00";
$horafincurso = "09:00";

	$agregar = oci_parse($conexion,"INSERT INTO curso VALUES 
    ('$idcurso','$nombrecurso','$anoencurso', '$materia_idmateria', '$docente_iddocente','$diacurso','$horainiciocurso','$horafincurso')");

	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>