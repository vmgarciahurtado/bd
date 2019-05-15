<html>
  <head>

  <?php
        include 'conexion.php';
        $json=array();
        $query = "SELECT codigoestudiante FROM Estudiante where rownum = 1";
        $statement = oci_parse ($conexion, $query);
        oci_execute ($statement);

        while ($row = oci_fetch_array ($statement, (OCI_NUM+OCI_RETURN_LOBS))){
          $json = $row[0];
        }
        echo $json
      ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Curso', 'Por curso'],
          ['Ganadores',    parseInt('<?php echo $json ?>')],
          ['Perdedores',      2],
          ['Desertores',  2]
        ]);

        var options = {
          title: 'GRAFICA ESTADISTICA DE PERDEDORES'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>