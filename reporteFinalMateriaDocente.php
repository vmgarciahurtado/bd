<html>
  <head>

  <?php
  // SORNERES AQUÍ DEBERÍAN IR LOS VALORES EN BRUTO DE CANTIDAD ESTUDIANTES APROBADOS, REPROBADOS Y DESERTORES PARA IMPRIMIR
  // OBVIAMENTE HAY QUE CAMBIAR LA CONSULTA, PERO LA TRATE DE PREPARAR PARA QUE SÓLO SEA ESO
      /*  include 'conexion.php';

        // APROBADOS
        $json1=array();
        $query = "SELECT codigoestudiante FROM Estudiante where rownum = 1";
        $statement = oci_parse ($conexion, $query);
        oci_execute ($statement);

        while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))){
            $json1 = $row[0];
          }

          // REPROBADOS
        $json2=array();
        $query2 = "SELECT codigoestudiante FROM Estudiante where rownum = 1";
        $statement2 = oci_parse ($conexion, $query2);
        oci_execute ($statemen2);

        while ($row = oci_fetch_array ($statement2, (OCI_NUM+OCI_RETURN_LOBS))){
            $json2 = $row[0];
          }

          // DESERTORES
        $json3=array();
        $query3 = "SELECT codigoestudiante FROM Estudiante where rownum = 1";
        $statement3 = oci_parse ($conexion, $query3);
        oci_execute ($statemen3);

        while ($row = oci_fetch_array ($statement3, (OCI_NUM+OCI_RETURN_LOBS))){
            $json3 = $row[0];
          }*/
      ?>

    <title>REPORTE PORCENTAJE DE MORTALIDAD</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // ESTÁ SERÍA LA MANERA EN LA QUE SE VISUALIZARÍAN LOS DATOS (RECUERDE DEBEN SER DATOS EN BRUTO)
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Reprobados', { role: 'style' } ],
        ['Aprobados', 10/*parseInt('<?php echo $json3 ?>')*/, 'color: gray'],
        ['Reprobados', 14, 'color: #76A7FA'],
        ['Desertores', 5, 'opacity: 0.2']
      ]);

      var options = {
        title: 'Cantidad de estudiantes aprobados, reprobados y desertores',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Analisis Estadistico',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'Estadistica',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };

        var chart_area = document.getElementById('chart_div');
        var chart = new google.visualization.BarChart(chart_area);

        google.visualization.events.addListener(chart, 'ready', function(){
     chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';

    });
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

  <div class="container" id="testing">  
        <br>
            <h3 align="center">PORCENTAJE DE MORTALIDAD</h3>  
        <br />
  <div class="panel panel-default">
  <div class="panel-heading">
     <h3 class="panel-title">TASA DE MORTALIDAD ESTUDIANTIL</h3>
    </div>
  <div class="panel-body" align="center">
  <div id="chart_div"></div>
    </div>
    </div>
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