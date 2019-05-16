<?PHP
include 'conexion.php';
    $codigo= $_POST["codigo"];
    $estado= $_POST["estado"];
    

    $agregar = oci_parse($conexion,"UPDATE estudiante SET estadoEstudiante='$estado' WHERE 
    codigoEstudiante='$codigo'");
	 if(oci_execute($agregar)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>