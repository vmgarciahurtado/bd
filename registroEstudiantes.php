<?PHP
include 'conexion.php';

	$codigo= $_POST["codigoestudiante"];
	$cedula= $_POST["cedulaestudiante"];
	$nombre= $_POST["nombreestudiante"];
	$fechaNacimiento= $_POST["fechaNacimiento"];
	$estado= $_POST["estadoestudiante"];
	$direccion= $_POST["direccionestudiante"];
	$telefono= $_POST["telefonoestudiante"];
	$correo= $_POST["correoelectronico"];
	$programaAcademico= $_POST["pacademico_idpacademico"];
$semestre_idSemestre=$_POST["semestre_numerosemestre"];

	$agregar = oci_parse($conexion,"INSERT INTO estudiante VALUES
	('$codigo','$cedula','$nombre','$fechaNacimiento','$estado','$direccion','$telefono','$correo','$programaAcademico', '$semestre_idSemestre')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>

