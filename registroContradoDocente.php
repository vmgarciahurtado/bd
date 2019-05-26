<?php
include 'conexion.php';

$duracion = $_POST["duracioncontrato"];
$iddocente = $_POST["docente_iddocente"];

$agregar = oci_parse($conexion,"INSERT INTO contrato VALUES 
('1', '$duracion','$iddocente')");

 if(oci_execute($agregar)){
    echo "registra";
}else{
    echo "noRegistra";
} 
?>