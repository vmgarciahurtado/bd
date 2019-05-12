<?PHP
include 'conexion.php';

$idcurso=$_POST["IdCurso"];
$nombrecurso=$_POST["NombreCurso"];
$añoencurso=$_POST["AñoEnCurso"];
$materia_idmateria=$_POST["Materia_IdMateria"];
$docente_iddocente=$_POST["Docente_IdDocente"];

	$agregar = oci_parse($conexion,"INSERT INTO Curso VALUES ('$idcurso','$nombrecurso','$añoencurso', '$materia_idmateria', '$docente_iddocente')");

	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
	//Victor
?>