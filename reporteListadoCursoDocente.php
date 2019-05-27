<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LISTADO CURSO direccionestudiante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<br /><br />  
        
        <div class="container" id="testing">  
        <br>
            <h3 align="center">PLANILLA DE CURSOS</h3>  
        <br />
   <div class="panel panel-default">
    <div class="panel-heading">
    <center><h3 class="panel-title">LISTADO CURSOS DEL DOCENTE</h3></center>
    </div>
    
    <div class="panel-body" align="center">
    </div>
    <center><table id="main-container" border="1px" width="50%"></center>
		<tr>
    <thead>
			<td>CURSO</td>
			<td>ESTUDIANTE</td>
			<td>DOCENTE</td>
      </thead>
		</tr>

		<?php 

include 'conexion.php';

$query = "SELECT c.nombrecurso, e.nombreestudiante, d.nombredocente
FROM Curso c JOIN estudiantes_curso ec ON(ec.curso_idcurso=c.idcurso)
JOIN estudiante e ON(e.codigoestudiante=ec.estudiante_codigoestudiante)
JOIN materia m ON(c.materia_idmateria=m.idmateria)
JOIN docente d ON(d.iddocente=docente_iddocente) WHERE d.iddocente=3";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
		 ?>

		<tr>
			<td><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>
			<td><?php echo $row[2] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
   </div>
        </div>
      

  <br />
  <div align="center">
   <form method="post" id="make_pdf" action="create_pdf.php">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">DESCARGAR EN PDF</button>
   </form>
  </div>
  <br />
  <br />
  <div id="chart_div" ></div>
<div id="chart_div2" ></div>
  <br />
    </body>  
</html>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>
    
</body>
</html>

