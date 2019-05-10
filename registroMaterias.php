<?PHP
include 'conexion.php';

	$idmateria= $_POST["idmateria"];
	$nombre= $_POST["nombre"];
	$intensidadhoraria= $_POST["intensidadhoraria"];
	$numerocreditos= $_POST["nucreditoacademico"];
	$actadescriptiva= $_POST["actadescriptiva"];
	$costomateria= $_POST["costomateria"];
	$entornomateria= $_POST["entorno_identorno"];
	$prerrequisito= $_POST["prer_idprerequisito"];u
    $materia= $_POST["materia_idmateria"];

   /* $idmateria= "2";
	$nombre= "Programacion";
	$intensidadhoraria= "22";
	$numerocreditos= "6";
	$actadescriptiva= "Esta es el acta descriptiva";
	$costomateria= "300000";
	$entornomateria= "1";
	$prerrequisito= "";
    $materia= "";*/


	$agregar = oci_parse($conexion,"INSERT INTO materia VALUES (
        '$idmateria','$nombre','$intensidadhoraria','$numerocreditos',
        '$actadescriptiva','$costomateria','$entornomateria','$prerrequisito','$materia')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

