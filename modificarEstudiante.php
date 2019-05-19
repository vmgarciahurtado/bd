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
    $semestre = $_POST["semestre_numeroSemestre"];

	$agregar = oci_parse($conexion,"UPDATE estudiante SET 
    cedulaEstudiante = '$cedula', nombreEstudiante ='$nombre', fechaNacimiento = '$fechaNacimiento',
    estadoEstudiante= '$estado', direccionEstudiante= '$direccion', telefonoEstudiante= '$telefono',
    correoElectronico= '$correo', pacademico_idpacademico='$programaAcademico', semestre_numeroSemestre= '$semestre'
     WHERE codigoEstudiante='$codigo'");
    
	 if(oci_execute($agregar)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>