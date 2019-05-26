<?PHP
include 'conexion.php'
$codigoestudiante=$_REQUEST["codigo"];

$statement = oci_parse ($conexion,"");
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $json = $row[0];
}

?>