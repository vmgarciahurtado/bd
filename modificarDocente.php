<?PHP
include 'conexion.php';

	$iddocente= $_POST["iddocente"];
	$nombredocente= $_POST["nombredocente"];
	$tipodocente= $_POST["tipodocente_idtipodocente"];
	$estadoDocente=$_POST["estadodocente"];
    
	$agregar = oci_parse($conexion,"UPDATE docente SET nombredocente='$nombredocente',tipodocente_idtipodocente = '$tipodocente', estadodocente='$estadoDocente' WHERE iddocente = '$iddocente'");
        
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>