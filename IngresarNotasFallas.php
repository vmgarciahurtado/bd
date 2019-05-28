<?PHP
include 'conexion.php';

    $json=array();

    $definitiva= $_POST["definitivacorte"];
    $corte=$_POST["corte"];
    $inasistencia=$_POST["fallas"];
    $estudiante=$_POST["codigoestudiante"];
    $curso=$_POST["idcurso"];

	$agregar = oci_parse($conexion,"INSERT INTO seguimiento_corte VALUES
	('1','$definitiva','$corte','$inasistencia')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
    }
    
    $idseguimientocorte  = oci_parse($conexion, "SELECT idseguimientocorte FROM seguimiento_corte where rownum=1 order by idseguimientocorte desc");
	$respuesta  = oci_execute($idseguimientocorte);
	while ($row = oci_fetch_array ($idseguimientocorte, (OCI_NUM+OCI_RETURN_LOBS))) {
		$json = $row[0];
	}
 
	$insertar2 = oci_parse($conexion,"INSERT INTO seguimiento VALUES 
	('1', '$estudiante', '$curso', '$json')");
				
	 if(oci_execute($insertar2)){
		echo "registra";
	}else{
		echo "noRegistra";
	}
?>
