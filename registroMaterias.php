<?PHP
include 'conexion.php';

	$nombre= $_POST["nombre"];
	$intensidadhoraria= $_POST["intensidadhoraria"];
	$numerocreditos= $_POST["numerocreditos"];
	$actadescriptiva= $_POST["actadescriptiva"];
	$costomateria= $_POST["costomateria"];
	$entornomateria= $_POST["entornomateria"];	
	$prerrequisito= $_POST["prerrequisito"];
	$idmateria = "0";

	$insertar = oci_parse($conexion,"INSERT INTO materia VALUES 
	('$idmateria','$nombre','$intensidadhoraria','$numerocreditos','$actadescriptiva','$costomateria','$entornomateria','$prerrequisito')");
				
	 if(oci_execute($insertar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

