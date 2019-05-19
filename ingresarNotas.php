<?PHP
include 'conexion.php';

    $definitivaCorte=$_POST["definitivacorte"];
    $corte=$_POST["corte_idcorte"];

	$modifico = oci_parse($conexion,"UPDATE seguimiento_corte SET definitivacorte='$definitivaCorte'
    WHERE corte_idcorte='$corte'");
        
	 if(oci_execute($modifico)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>