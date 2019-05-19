<?PHP
include 'conexion.php';

	$nombre= $_POST["nombre"];
	$intensidadhoraria= $_POST["intensidadhoraria"];
	$numerocreditos= $_POST["nucreditoacademico"];
	$actadescriptiva= $_POST["actadescriptiva"];
	$costomateria= $_POST["costomateria"];
	$entornomateria= $_POST["entorno_identorno"];
	//$materia_IdMateria= $_POST["materia_idmateria"]
	$materia"1";

    
	/*$nombre= "Programacion";
	$intensidadhoraria= "22";
	$numerocreditos= "6";
	$actadescriptiva= "Esta es el acta descriptiva";
	$costomateria= "300000";
	$entornomateria= "1";
	$prerrequisito= "";
    $materia= "";*/


	$agregar = oci_parse($conexion,"INSERT INTO materia VALUES (
      	'$nombre','$intensidadhoraria','$numerocreditos',
        '$actadescriptiva','$costomateria','$entornomateria','$materia')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

