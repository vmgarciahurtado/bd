<?PHP
include 'conexion.php';

	$iddocente= $_POST["iddocente"];
	$nombredocente= $_POST["nombredocente"];
	$tipodocente= $_POST["tipodocente"];
	$estadoDocente=$_POST["estadoDocente"];

	$agregar = oci_parse($conexion,"INSERT INTO docente VALUES 
	('$iddocente','$nombredocente','$tipodocente', '$estadoDocente')");
        
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

