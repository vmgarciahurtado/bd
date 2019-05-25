<?PHP
include 'conexion.php';
    $codigo= $_POST["iddocente"];
    $estado= $_POST["estadodocente"];
    

    $agregar = oci_parse($conexion,"UPDATE docente SET estadodocente='$estado' WHERE 
    iddocente='$codigo'");
	 if(oci_execute($agregar)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>