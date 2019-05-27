<?PHP
include 'conexion.php';

$json=array();
$codigo=$_REQUEST["codigo"];

$query = "SELECT p.nombreprograma,p.costoprograma
from estudiante e join programaacademico p on(e.pacademico_idpacademico = p.idprogramaacademico)
where e.codigoestudiante = 192584";

$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
    $result["nombre"]= $row[0];
    $result["costo"]= $row[1];
	$json['matricula'][]=$result;
}
echo json_encode($json)
?>