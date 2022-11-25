<?php
include "../config.php";
//----------------------------------------Primeiro Lugar do Bairro que Mais Vende---------------------------------------------------
        $quer_cont1 = $conn->prepare("SELECT bairro as bairros1,COUNT(bairro) as qntvez1  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 1");
        $quer_cont1->execute();
        $valor1 = $quer_cont1->fetchObject();
//--------------------------------------------FIM---------------------------------------------------------------------------------

//-----------------------------------------Segundo Lugar Do Bairro que mais vende-------------------------------------------------
$quer_cont2 = $conn->prepare("SELECT bairro as bairros2,COUNT(bairro) as qntvez2  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 2");
        $quer_cont2->execute();
        $valor2 = $quer_cont2->fetchObject();

//--------------------------------------------FIM---------------------------------------------------------------------------------
     ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>
  <script type="text/javascript">
  
  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ['<?php echo $valor1->bairros1 ?>', <?php echo $valor1->qntvez1 ?>, "#b87333"],
        ["arthur", 1, "gold"],
        ["oi", 1, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Numeros de entregas em cada Bairro",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }

 
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

</body>
</html>