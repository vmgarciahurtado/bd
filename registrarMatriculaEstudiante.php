<?PHP
include 'conexion.php';

    $estudiante= $_POST["estudiante"];
    $costotal= $_POST["costototal"];
    $programa=$_POST["programa"];
    
	$agregar = oci_parse($conexion,"INSERT INTO matricula VALUES ('1', '$estudiante', '$costotal', '$programa')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	}
?>