<?PHP
include 'conexion.php';

    $json=array();
	$codigo= $_POST["codigo"];
    $cedula= $_POST["cedula"];

    $query = "SELECT tipo FROM ingreso where codigo='$codigo' and cedula='$cedula'";
    $statement = oci_parse ($conexion, $query);
    oci_execute ($statement);

    while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))){
      $json = $row[0];
    } 

    switch($json){
        case 'estudiante':
        echo 'estudiante';
        break;

        case 'registroycontrol':
        echo 'registroycontrol';
        break;

        case 'director':
        echo 'director';
        break;

        case 'docente':
        echo 'docente';
        break;

        default:
        echo 'noExste';
        break;
    }
    ?>