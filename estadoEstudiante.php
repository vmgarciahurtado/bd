<?PHP
include 'conexion.php';
    $codigo= $_POST["codigoestudiante"];
    $estado= $_POST["estadoestudiante"];
    

    $agregar = oci_parse($conexion,"UPDATE estudiante SET estadoEstudiante='$estado' WHERE 
    codigoEstudiante='$codigo'");
	 if(oci_execute($agregar)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>