<?PHP
include 'conexion.php';

	$iddocente= $_POST["iddocente"];
	$nombredocente= $_POST["nombredocente"];
	$tipodocente= $_POST["tipodocente"];

	$agregar = oci_parse($conexion,"INSERT INTO docente VALUES 
	('$iddocente','$nombredocente','$tipodocente', '1')");
        
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

