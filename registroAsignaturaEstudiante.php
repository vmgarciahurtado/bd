<?php
include 'conexion.php';

$Materia_idMateria=$_POST["Materia_IdMateria"];
$Estudiante_CodigoEstudiante=$_POST["Estudiante_CodigoEstudiante"];
    
$agregar = oci_parse($conexion, "INSERT INTO estadomateria VALUES 
('Disponible', '$Materia_idMateria', '$Estudiante_CodigoEstudiante')");

 if(oci_execute($agregar)){
    echo "Registra";
 } else {
     echo "NoRegistra";
 }
?>