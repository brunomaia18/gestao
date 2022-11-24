




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
    <div class="text-center">
        <input type="number" name="month" id="month">
        <button name='buscar'>Buscar</button>
    </div>
    <br>
    <br>
<?php
include "../config.php";
//---------------------NUMERO DE CLIENTES CADSTRADO NA LOJA -----------------------------//
$Nclientes = $conn->prepare("SELECT COUNT(cliente) as clientes From cadastro");
$Nclientes->execute();
$n = $Nclientes->fetchObject();
//--------------------FIM DO CODIGO-----------------------------------------------------//

//--------------------TOTAL VENDIDO NO MES----------------------------------------------//

$totalVendido = $conn->prepare("SELECT SUM(valor) as valor From cadastro WHERE MONTH(venda) ");
$totalVendido->execute();
$valorSoma = $totalVendido->fetchObject();
//--------------------FIM DO CODIGO-----------------------------------------------------//
?>
<div class="container text-center">
<div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">VALOR VENDIDO</h5>
                                    <h2 class="mb-0"><?php echo $valorSoma->valor; ?></h2>
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
                                                        <h2 class="mb-0"><?php echo $n->clientes; ?></h2>
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
                                                                        <h2 class="mb-0"></h2>
                                                                    </div>
                                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                                        <i class=" fas fa-cart-plus fa-fw fa-sm text-success"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
</div>
</div>
</body>
</html>