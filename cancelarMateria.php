<?PHP
include 'conexion.php';

$IdEstadoMateria=$_POST["IdEstadoMateria"];
$TipoEstado=$_POST["TipoEstado"];
$Materia_IdMateria=$_POST["Materia_IdMateria"];
$Estudiante_CodigoEstudiante=$_POST["Estudiante_CodigoEstudiante"];

    $modificar = oci_parse($conexion,"UPDATE EstadoMateria SET TipoEstado='Cancelada' WHERE 
    IdEstadoMateria=$IdEstadoMateria");
	 if(oci_execute($modificar)){
		echo "modificado";
	}else{
		echo "noModificado";
	} 
?>