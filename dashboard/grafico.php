<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de valores </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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

//----------------------------------------Primeiro Lugar do Bairro que Mais Vende---------------------------------------------------
$quer_cont1 = $conn->prepare("SELECT bairro as bairros1,COUNT(bairro) as qntvez1  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 1");
$quer_cont1->execute();
$valor1 = $quer_cont1->fetchObject();
//--------------------------------------------FIM---------------------------------------------------------------------------------

//-----------------------------------------Segundo Lugar Do Bairro que mais vende-------------------------------------------------
$quer_cont2 = $conn->prepare("SELECT bairro as bairros2,COUNT(bairro) as qntvez2  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 2");
$quer_cont2->execute();
while($valor2 = $quer_cont2->fetchObject()){
    $bairros2 = $valor2->bairros2;
    $qntvez2 = $valor2->qntvez2;
};
//--------------------------------------------FIM---------------------------------------------------------------------------------
?>

<div class="container text-center">
<div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">VALOR VENDIDO</h5>
                                    <h2 class="mb-0"><?php echo "R$ ".$valorSoma->valor;  ; ?></h2>
                                    
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
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
                                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="card border-3 border-top border-top-primary">
                                                                <div class="card-body">
                                                                    <div class="d-inline-block">
                                                                        <h5 class="text-muted">Pedidos</h5>
                                                                        <h2 class="mb-0">loading...</h2>
                                                                    </div>
                                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                                        <i class=" fas fa-cart-plus fa-fw fa-sm text-success"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>
  <script type="text/javascript">
  
  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ['<?php echo $valor1->bairros1 ?>', <?php echo $valor1->qntvez1 ?>, "#b87333"],
        ["<?php echo  $bairros2 ?>",  <?php echo $qntvez2 ?>, "gold"],
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