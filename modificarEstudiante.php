<?PHP
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
$semestre = $_POST["semestre_numeroSemestre"];

	$agregar = oci_parse($conexion,"UPDATE estudiante SET 
    cedulaEstudiante = '$cedula', nombreEstudiante ='$nombre', fechaNacimiento = '$fechaNacimiento',
    estadoEstudiante= '$estado', direccionEstudiante= '$direccion', telefonoEstudiante= '$telefono',
    correoElectronico= '$correo', pacademico_idpacademico='$programaAcademico', semestre_numeroSemestre= '$semestre'");
    
	 if(oci_execute($agregar)){
		echo "modifico";
	}else{
		echo "noModifico";
	} 
?>