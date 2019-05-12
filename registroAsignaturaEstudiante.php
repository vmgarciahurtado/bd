<?php
include 'conexion.php';
// ESTA TABLA INTERMEDIA SE CREO POR EL HECHO DE TENER UN ESTUDIANTE CON MUCHAS MATERIAS Y GUARDARLAS ALLÍ
//$id = $_POST["idasignaturamateriaestudiante"];
//$codigo = $_POST["codigo"];
//$idmateria = $_POST["idmateria"];


$id= "12346";
$codigo= "22";
$idmateria= "20";
    
$agregar = oci_parse($conexion, "INSERT INTO asignaturamateriaestudiante VALUES ('$id',
 '$codigo', '$idmateria')");

 if(oci_execute($agregar)){
    echo "Registra";
 } else {
     echo "NoRegistra";
 }
?>