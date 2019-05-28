<html>
  <head>

  <?php
  // SORNERES AQUÍ DEBERÍAN IR LOS VALORES EN BRUTO DE CANTIDAD ESTUDIANTES QUIENS GANAN, Y DE LOS PERDEDORES PARA IMPRIMIR
  // OBVIAMENTE HAY QUE CAMBIAR LA CONSULTA, PERO LA TRATE DE PREPARAR PARA QUE SÓLO SEA ESO
        include 'conexion.php';

        // GANADORES
        $json1=array();
        $query = "SELECT count(*) FROM(SELECT count(e.codigoestudiante)
        FROM estudiante e JOIN seguimiento s ON(s.estudiante_codigoestudiante=e.codigoestudiante) 
        JOIN seguimiento_corte sc ON(sc.idseguimientocorte=s.seg_corte_idsegcorte) JOIN curso c ON(c.idcurso=s.curso_idcurso)
        group by e.codigoestudiante having sum(sc.inasistencia)<13)";
        $statement = oci_parse ($conexion, $query);
        oci_execute ($statement);

        while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))){
            $json1 = $row[0];
          }

          // PERDEDORES
        $json2=array();
        $query2 = "SELECT count(*) FROM(SELECT count(e.codigoestudiante)
        FROM estudiante e JOIN seguimiento s ON(s.estudiante_codigoestudiante=e.codigoestudiante) 
        JOIN seguimiento_corte sc ON(sc.idseguimientocorte=s.seg_corte_idsegcorte) JOIN curso c ON(c.idcurso=s.curso_idcurso)
        group by e.codigoestudiante having sum(sc.inasistencia)>13)";
        $statement2 = oci_parse ($conexion, $query2);
        oci_execute ($statement2);

        while ($row = oci_fetch_array ($statement2, (OCI_NUM+OCI_RETURN_LOBS))){
            $json2 = $row[0];
          }
      ?>

    <title>REPORTE PORCENTAJE DE MORTALIDAD</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

          // PARA QUE LA CONSULTA FUNCIONE RECUERDE IMPRIMIR EL DATO EN BRUTO DEL JSON
      function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Docente', { role: 'style' } ],
        ['Reprobados dentro del limite de asistencias', parseInt('<?php echo $json2 ?>'), 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['Aprobados fuera del limite de asistencias', parseInt('<?php echo $json1 ?>'), 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);

      var options = {
        title: 'PORCENTAJE DE ESTUDIANTES REPROBADOS POR INASISTENCIA',
        colors: ['#9575cd', '#33ac71'],
        hAxis: {
          title: 'Analisis estadistico',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'PROMEDIO INASISTENCIAS'
        }
      };

        var chart_area = document.getElementById('chart_div');
        var chart = new google.visualization.ColumnChart(chart_area);

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
    <div id="chart_div" style="width: 650px; height: 500px;"></div>
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