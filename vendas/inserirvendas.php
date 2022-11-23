<?php 
include "../config.php";

$vendedor = $_POST['vendedor'];
$cliente = $_POST['cliente'];
$meio = $_POST['meio'];
$codigo = $_POST['codigo'];
$quantidade = $_POST['quantidade'];
$venda = $_POST['venda'];
$entrega = $_POST['entrega'];
$valor = $_POST['valor'];
$pagamento = $_POST['pagamento'];
$obser = $_POST['obs'];

$tabelavendas = "INSERT INTO vendas(vendedor,cliente,meio,codigo,quantidade,venda,entrega,valor,pagamento,obs) VALUES(:vendedor,:cliente,:meio,:codigo,:quantidade,:venda,:entrega,:valor,:pagamento,:obs)";
$resul = $conn->prepare($tabelavendas);

       $resul->bindParam(':vendedor',$vendedor );
       $resul->bindParam(':cliente', $cliente);
       $resul->bindParam(':meio',$meio);
       $resul->bindParam(':codigo',$codigo );
       $resul->bindParam(':quantidade', $quantidade);
       $resul->bindParam(':venda', $venda);
       $resul->bindParam(':entrega', $entrega);
       $resul->bindParam(':valor', $valor);
       $resul->bindParam(':pagamento',$pagamento);
       $resul->bindParam(':obs', $obser);

       $resul->execute();
       echo "to aqui tbm";
?>