<html>  
    <head>  

    <?php
  // prueba
        include 'conexion.php';
        $json1=array();
        $query = "SELECT codigoestudiante FROM Estudiante where rownum = 1";
        $statement = oci_parse ($conexion, $query);
        oci_execute ($statement);

        $json2 = array();
        $query2 = "SELECT codigoEstudiante FROM estudiante where codigoEstudiante = 5";
        $statement2 = oci_parse ($conexion, $query2);
        oci_execute ($statement2);

        $json3 = array();
        $query3 = "SELECT codigoEstudiante FROM estudiante where codigoEstudiante = 9";
        $statement3 = oci_parse ($conexion, $query3);
        oci_execute ($statement3);

        while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))){
          $json1 = $row[0];
        }

        while ($row = oci_fetch_array ($statement2, (OCI_NUM+OCI_RETURN_LOBS))){
          $json2 = $row[0];
        }

        while ($row = oci_fetch_array ($statement3, (OCI_NUM+OCI_RETURN_LOBS))){
          $json3 = $row[0];
        }
      ?>
      
        <title>Export Google Chart to PDF using PHP with DomPDF</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilos.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   google.charts.load('current', {'packages':['table']});
   google.charts.setOnLoadCallback(drawTable);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable([
          ['Curso', 'Por curso'],
          ['Ganadores',    10/*parseInt('<?php echo $json3 ?>')*/],
          ['Perdedores',      10/*parseInt('<?php echo $json2 ?>')*/],
          ['Desertores',  10/*parseInt('<?php echo $json1 ?>')*/]
        ]);

        var options = {
          title: 'GRAFICA ESTADISTICA DEL CURSO',
          legend: 'labeled',
          width: 650,
          height: 600,
          chartArea:{left:120, top:100, width:"100%", height:"50%"},
          is3D: true 
        };
    var chart_area = document.getElementById('piechart');
    var chart = new google.visualization.PieChart(chart_area);

    google.visualization.events.addListener(chart, 'ready', function(){
     chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
    });
    chart.draw(data, options);
   }
        </script>

    </head>  
    <body> 
     
        <br /><br />  
        
        <div class="container" id="testing">  
        <center><table id="main-container" border="1px" width="50%"></center>
        <br>
            <h3 align="center">PRUEBA GRAFICA</h3>  
        <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">PRUEBA</h3>
    </div>
    
    <div class="panel-body" align="center">
     <div id="piechart" style="width: 100%; max-width:900px; height: 500px; "></div>
    </div>
    
		<tr>
    <thead>
			<td>CODIGO</td>
			<td>CEDULA</td>
			<td>NOMBRE</td>
			<td>DIRECCION</td>
			<td>TELEFONO</td>	
      </thead>
		</tr>

		<?php 

$query = "SELECT codigoestudiante,cedulaestudiante,nombreestudiante,direccionestudiante,telefonoestudiante from estudiante";
$statement = oci_parse ($conexion, $query);
oci_execute ($statement);

while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))) {
		 ?>

		<tr>
			<td><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>
			<td><?php echo $row[2] ?></td>
			<td><?php echo $row[3] ?></td>
			<td><?php echo $row[4] ?></td>
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

