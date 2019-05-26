<?php
include 'conexion.php';

$duracion = $_POST["duracioncontrato"];
$iddocente = $_POST["docente_iddocente"];

$agregar = oci_parse($conexion,"INSERT INTO contrato VALUES 
<<<<<<< HEAD
('1','$duracion','$iddocente')");
=======
('1', '$duracion','$iddocente')");
>>>>>>> d917c9444ca1cf40621638675c267b0846fee15f

 if(oci_execute($agregar)){
    echo "registra";
}else{
    echo "noRegistra";
} 
?>