<?PHP
include 'conexion.php';

	$json = array();

	$programa=$_POST["programa"];
	$nombre= $_POST["nombre"];
	$intensidadhoraria= $_POST["intensidadhoraria"];
	$numerocreditos= $_POST["numerocreditos"];
	$actadescriptiva= $_POST["actadescriptiva"];
	$costomateria= $_POST["costomateria"];
	$entornomateria= $_POST["entornomateria"];	
	$prerrequisito= $_POST["prerrequisito"];
	$idmateria = "1";

	

	$insertar = oci_parse($conexion,"INSERT INTO materia VALUES 
	('$idmateria','$nombre','$intensidadhoraria','$numerocreditos','$actadescriptiva','$costomateria','$entornomateria','$prerrequisito')");
				
	 if(oci_execute($insertar)){
		echo "registra";
	}else{
		echo "noRegistra";
	}
	
	$idMateriaFK  = oci_parse($conexion, "SELECT idmateria FROM materia where rownum=1 order by idmateria desc");
	$respuesta  = oci_execute($idMateriaFK);
	while ($row = oci_fetch_array ($idMateriaFK, (OCI_NUM+OCI_RETURN_LOBS))) {
		$json = $row[0];
	}
 
	$insertar2 = oci_parse($conexion,"INSERT INTO materiaprogramaacademico VALUES 
	('1','$json','$programa')");
				
	 if(oci_execute($insertar2)){
		echo "registra";
	}else{
		echo "noRegistra";
	}
?>

