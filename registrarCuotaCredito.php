<?PHP
include 'conexion.php';

    $json = array();

    $metodoPago  = oci_parse($conexion, "SELECT idpagocredito FROM metodopagocredito where rownum=1 order by idpagocredito desc");
	$respuesta  = oci_execute($metodoPago);
	while ($row = oci_fetch_array ($metodoPago, (OCI_NUM+OCI_RETURN_LOBS))) {
		$json = $row[0];
    }
    
    $numeroCuota= $_POST["cuota"];
    
	$agregar = oci_parse($conexion,"INSERT INTO metodopagocredito VALUES ('1', '$numeroCuota', '1', '$json')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	}
?>