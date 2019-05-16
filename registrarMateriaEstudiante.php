?PHP
include 'conexion.php';
	$codigo= $_POST["codigo"];
	$cedula= $_POST["cedula"];
	$nombre= $_POST["nombre"];
	$fechaNacimiento= $_POST["fechaNacimiento"];
	$estado= $_POST["estado"];
	$direccion= $_POST["direccion"];
	$telefono= $_POST["telefono"];
	$correo= $_POST["correo"];
	$programaAcademico= $_POST["programaAcademico"];

	$agregar = oci_parse($conexion,"INSERT INTO estudiante VALUES ('$codigo','$cedula','$nombre','$fechaNacimiento','$estado','$direccion','$telefono','$correo','$programaAcademico')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

