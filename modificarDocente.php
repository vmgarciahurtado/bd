<?PHP
include 'conexion.php';

	$iddocente= $_POST["iddocente"];
	$nombredocente= $_POST["nombredocente"];
    
	$agregar = oci_parse($conexion,"UPDATE docente SET nombredocente='$nombredocente' WHERE iddocente = '$iddocente'");
        
	 if(oci_execute($agregar)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>