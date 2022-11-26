<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de valores </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>
</head>
<body>
<?php
include "../config.php";
//---------------------NUMERO DE CLIENTES CADSTRADO NA LOJA -----------------------------//
$Nclientes = $conn->prepare("SELECT COUNT(cliente) as clientes From cadastro");
$Nclientes->execute();
$n = $Nclientes->fetchObject();
//--------------------FIM DO CODIGO-----------------------------------------------------//

//--------------------TOTAL VENDIDO NO MES----------------------------------------------//
$totalVendido = $conn->prepare("SELECT SUM(valor) as valor From cadastro  ");
$totalVendido->execute();
$valorSoma = $totalVendido->fetchObject();

//--------------------FIM DO CODIGO-----------------------------------------------------//

//---------------------NUMERO DE VENDAS CADSTRADA NA LOJA -----------------------------//
$Nclientes1 = $conn->prepare("SELECT COUNT(cliente) as clientes From vendas");
$Nclientes1->execute();
$n1 = $Nclientes1->fetchObject();
//--------------------FIM DO CODIGO-----------------------------------------------------//

//----------------------------------------Primeiro Lugar do Bairro que Mais Vende---------------------------------------------------
$quer_cont1 = $conn->prepare("SELECT bairro as bairros1,COUNT(bairro) as qntvez1  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 1");
$quer_cont1->execute();
$valor1 = $quer_cont1->fetchObject();
//--------------------------------------------FIM---------------------------------------------------------------------------------

//-----------------------------------------Segundo Lugar Do Bairro que mais vende-------------------------------------------------
$quer_cont2 = $conn->prepare("SELECT bairro AS bairros2,COUNT(bairro) AS qntvez  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 2");
$quer_cont2->execute();
while($valor2 = $quer_cont2->fetchObject()){
    $bairros2 = $valor2->bairros2;
    $qntvez2 = $valor2->qntvez;
};
//--------------------------------------------FIM---------------------------------------------------------------------------------

//-----------------------------------------TERCEIRO Lugar Do Bairro que mais vende-------------------------------------------------
$quer_cont3 = $conn->prepare("SELECT bairro as bairros3,COUNT(bairro) as qntvez3  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 3");
$quer_cont3->execute();
while($valor3 = $quer_cont3->fetchObject()){
    $bairros3 = $valor3->bairros3;
    $qntvez3 = $valor3->qntvez3;
};
//--------------------------------------------FIM---------------------------------------------------------------------------------//


//------------------------------------------1 Plataforma mais pedida---------------------------------------------------------------//
$contmeio = $conn->prepare("SELECT meio as meios,COUNT(meio) as qntvez  FROM cadastro GROUP BY meios HAVING COUNT(meio) >= 1 ORDER BY count(meio) DESC LIMIT 1");
$contmeio->execute();
$VindaClientes = $contmeio->fetchObject();
//--------------------------------------------FIM---------------------------------------------------------------------------------//
//------------------------------------------2 Plataforma mais pedida---------------------------------------------------------------//
$contmeio2 = $conn->prepare("SELECT meio as meios,COUNT(meio) as qntvez  FROM cadastro GROUP BY meios HAVING COUNT(meio) >= 1 ORDER BY count(meio) DESC LIMIT 2");
$contmeio2->execute();
while($VindaClientes2 = $contmeio2->fetchObject()){
    $meios2= $VindaClientes2->meios;
    $qntvez2meios= $VindaClientes2->qntvez;
}
//--------------------------------------------FIM---------------------------------------------------------------------------------//

//------------------------------------------3 Plataforma mais pedida---------------------------------------------------------------//
$contmeio3 = $conn->prepare("SELECT meio as meios,COUNT(meio) as qntvez  FROM cadastro GROUP BY meios HAVING COUNT(meio) >= 1 ORDER BY count(meio) DESC LIMIT 3");
$contmeio3->execute();
while($VindaClientes3 = $contmeio3->fetchObject()){
    $meios3= $VindaClientes3->meios;
    $qntvez3meios= $VindaClientes3->qntvez;
}
//--------------------------------------------FIM---------------------------------------------------------------------------------//

//------------------------------------------4 Plataforma mais pedida---------------------------------------------------------------//
$contmeio4 = $conn->prepare("SELECT meio as meios,COUNT(meio) as qntvez  FROM cadastro GROUP BY meios HAVING COUNT(meio) >= 1 ORDER BY count(meio) DESC LIMIT 4");
$contmeio4->execute();
while($VindaClientes4 = $contmeio4->fetchObject()){
    $meios4= $VindaClientes4->meios;
    $qntvez4= $VindaClientes4->qntvez;
}
//--------------------------------------------FIM---------------------------------------------------------------------------------//

//------------------------------------------5 Plataforma mais pedida---------------------------------------------------------------//
$contmeio5 = $conn->prepare("SELECT meio as meios,COUNT(meio) as qntvez  FROM cadastro GROUP BY meios HAVING COUNT(meio) >= 1 ORDER BY count(meio) DESC LIMIT 5");
$contmeio5->execute();
while($VindaClientes5 = $contmeio5->fetchObject()){
    $meios5= $VindaClientes5->meios;
    $qntvez5= $VindaClientes5->qntvez;
}
//--------------------------------------------FIM---------------------------------------------------------------------------------//
?>

<div class="container text-center ">
<div class="row">
                    <div class="col-sm">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">VALOR VENDIDO</h5>
                                    <h2 class="mb-0"><?php echo "R$ ".$valorSoma->valor;   ?></h2>
                                    
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-sm">
                                            <div class="card border-3 border-top border-top-primary">
                                                <div class="card-body">
                                                    <div class="d-inline-block">
                                                        <h5 class="text-muted">Clientes Cadastrado</h5>
                                                        <h2 class="mb-0"><?php echo $n->clientes ; ?></h2>
                                                    </div>
                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                        <i class="fa fa-users fa-fw fa-sm text-info"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                        <div class="col-sm">
                                                            <div class="card border-3 border-top border-top-primary">
                                                                <div class="card-body">
                                                                    <div class="d-inline-block">
                                                                        <h5 class="text-muted">VENDAS</h5>
                                                                        <h2 class="mb-0"><?php echo $n1->clientes ; ?></h2>
                                                                    </div>
                                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                                        <i class=" fas fa-cart-plus fa-fw fa-sm text-success"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
</div>
</div>


  <script type="text/javascript">
  
  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Vendido para:", { role: "style" } ],
        ['<?php echo $valor1->bairros1 ?>', <?php echo $valor1->qntvez1 ?>, "red"],
        ["<?php echo  $bairros2 ?>",  <?php echo $qntvez2 ?>, "Green"],
        ["<?php echo  $bairros3 ?>",<?php echo  $qntvez3 ?>, "yellow"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Top 3 Bairros que mais pedem",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
}
  //----------------------------Plataforma Mais pedida------------------------------------------------
  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawPie);
      function drawPie() {
        var pie = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php echo $VindaClientes->meios;?>', <?php echo $VindaClientes->qntvez;?>],
          ['<?php echo $meios2 ?>', <?php echo $qntvez2meios ?>],
          ['<?php echo $meios3 ?>',  <?php echo $qntvez3meios ?>],
          ['<?php echo $meios4 ?>', <?php echo $qntvez4 ?>],
          ['<?php echo $meios5 ?>',    <?php echo $qntvez5 ?>]
        ]);

        var options = {
          title: 'Por onde os clientes mais vem',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(pie, options);
    }
  </script>
<div class="container"  style="position: relative; right: 75px;  ">
    <div class="row">
<div id="columnchart_values" class="col-sm" style="width: 450px; height: 300px;"></div>
<br>
<div id="piechart_3d" class="col-sm" style="width: 700px; height: 400px; position: relative; top:50px; "></div>

</div>
</div>

</body>
</html>