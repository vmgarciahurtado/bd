<?PHP
include 'conexion.php';

    $IdAgenda= $_POST["IdAgenda"];
    $Dia= $_POST["Dia"];
    $HoraInicioClase= $_POST["HoraInicioClase"];
    $HoraFinClase=$_POST["HoraFinClase"];
    $HoraInicioAsesoria= $_POST["HoraInicioAsesoria"];
    $HoraFinAsesoria= $_POST["HoraFinAsesoria"];
    $Docente_IdDocente=$_POST["Docente_IdDocente"]
    
	$agregar = oci_parse($conexion,"INSERT INTO Agenda VALUES ('$IdAgenda', '$Dia', '$HoraInicioClase', '$HoraFinClase', '$HoraInicioAsesoria', '$HoraFinAsesoria', '$Docente_IdDocente')");
	 if(oci_execute($agregar)){
		echo "registra";
	}else{
		echo "noRegistra";
	} 
?>