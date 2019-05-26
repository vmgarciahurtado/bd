<?PHP
include 'conexion.php';

$idMateria=$_REQUEST["idmateria"];
$Estudiante=$_REQUEST["codigo"];

    $modificar = oci_parse($conexion,"UPDATE EstadoMateria SET TipoEstado='Cancelada' WHERE 
   	materia_idmateria='$idMateria' and estudiante_codigoestudiante='$Estudiante'");
	 if(oci_execute($modificar)){
		echo "modificado";
	}else{
		echo "noModificado";
	} 
?>