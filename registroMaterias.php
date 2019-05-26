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

	$materia=$_POST["materia"];
	$programa=$_POST["programa"];

	$insertar = oci_parse($conexion,"INSERT INTO materia VALUES 
	('$idmateria','$nombre','$intensidadhoraria','$numerocreditos','$actadescriptiva','$costomateria','$entornomateria','$prerrequisito')");
				
	 if(oci_execute($insertar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
	
	$idMateriaFK  = oci_parse($conexion, "SELECT idmateria FROM materia where rownum=1 order by idmateria desc");
    $respuesta  = oci_execute($idMateriaFK);
	echo $respuesta;	 
	/* INSERT A TABLA INTERMEDIA ENTRE MATERIA Y PROGRAMA
	$insertar2 = oci_parse($conexion,"INSERT INTO materiaprogramaacademico VALUES 
	('$1','$materia','$programa')");
				
	 if(oci_execute($insertar2)){
		echo "registra";
	}else{
		echo "noRegistra";
	}*/ 
?>

