<?php
include 'conexion.php';
$duracion = $_POST["duracion"];
$iddocente = $_POST["iddocente"];

$agregar = oci_parse($conexion,"INSERT INTO contrato VALUES 
('$duracion','$iddocente')");

 if(oci_execute($agregar)){
    echo "registra";
}else{
    echo "noRegistra";
} 
?>