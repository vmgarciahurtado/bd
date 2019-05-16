<?php
include 'conexion.php';

$idmatricula = $_POST["idmatricula"];
$estudiante =$_POST["estudiante_codigoestudiante"];
$costototal = $POST["costototal"];
$programaacademico = $POST["pacademico_idpacademico"];

$agregar = oci_parse($conexion,"INSERT INTO matricula VALUES 
('$idmatricula','$estudiante','$costototal', '$programaacademico')");

 if(oci_execute($agregar)){
    echo "registra";
}else{
    echo "noRegistra";
}
?>