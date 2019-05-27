<?php
include 'conexion.php';

$Materia_idMateria=$_POST["materia"];
$Estudiante_CodigoEstudiante=$_POST["estudiante"];
    
$agregar = oci_parse($conexion, "INSERT INTO estadomateria VALUES 
('1','Disponible', '$Materia_idMateria', '$Estudiante_CodigoEstudiante')");

 if(oci_execute($agregar)){
    echo "Registra";
 } else {
     echo "NoRegistra";
 }
?>