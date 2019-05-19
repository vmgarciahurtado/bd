<?PHP
include 'conexion.php';

    $corte=$_POST["corte_idcorte"];
    $fallas=$_POST["inasistencias"];

	$modifico = oci_parse($conexion,"UPDATE seguimiento_corte SET inasistencias='$fallas'
    WHERE corte_idcorte='$corte'");
        
	 if(oci_execute($modifico)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>