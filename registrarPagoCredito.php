<?PHP
include 'conexion.php';

$json = array();

    $matricula  = oci_parse($conexion, "SELECT idmatricula FROM matricula where rownum=1 order by idmatricula desc");
	$respuesta  = oci_execute($matricula);
	while ($row = oci_fetch_array ($matricula, (OCI_NUM+OCI_RETURN_LOBS))) {
		$json = $row[0];
    }
    
    $costotal= $_POST["costototal"];
    
	$agregar = oci_parse($conexion,"INSERT INTO metodopagocredito VALUES ('1', '$costotal', '$json')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	}
?>