<?php
include 'conexion.php';

$TipoEstado=$_POST["tipoestado"];
$Materia_idMateria=$_POST["Materia_IdMateria"];
$Estudiante_CodigoEstudiante=$_POST["Estudiante_CodigoEstudiante"];
    
$agregar = oci_parse($conexion, "INSERT INTO estadomateria VALUES 
('$TipoEstado', '$Materia_idMateria', '$Estudiante_CodigoEstudiante')");

 if(oci_execute($agregar)){
    echo "Registra";
 } else {
     echo "NoRegistra";
 }
?>