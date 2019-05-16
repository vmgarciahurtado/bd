<?php
include 'conexion.php';

$idpagocredito = "1";
$costototal = $_POST["costototal"];
$matricula = $_POST["matricula_idmatricula"];

$agregar = oci_parse($conexion,"INSERT INTO metodopagocredito VALUES 
('$idpagocredito','$costototal','$matricula')");

 if(oci_execute($agregar)){
    echo "registra";
}else{
    echo "noRegistra";
}
?>