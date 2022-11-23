<?php
include "../config.php";


$vendedor = $_POST['vendedor'];
$cliente = $_POST['cliente'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$endereco = $_POST['endereco'];
$meio = $_POST['meio'];
$codigo = $_POST['codigo'];
$quantidade = $_POST['quantidade'];
$venda = $_POST['venda'];
$entrega = $_POST['entrega'];
$valor = $_POST['valor'];
$pagamento = $_POST['pagamento'];
$obser = $_POST['obs'];



 
$query = "INSERT INTO cadastro(vendedor,cliente,telefone,cidade,bairro,endereco,meio,codigo,quantidade,venda,entrega,valor,pagamento,obs) VALUES(:vendedor,:cliente,:telefone,:cidade,:bairro,:endereco,:meio,:codigo,:quantidade,:venda,:entrega,:valor,:pagamento,:obs)";
$add = $conn->prepare($query);
    
       $add->bindParam(':vendedor',$vendedor );
       $add->bindParam(':cliente', $cliente);
       $add->bindParam(':telefone',$telefone);
       $add->bindParam(':cidade',$cidade );
       $add->bindParam(':bairro', $bairro);
       $add->bindParam(':endereco', $endereco);
       $add->bindParam(':meio', $meio);
       $add->bindParam(':codigo', $codigo);
       $add->bindParam(':quantidade', $quantidade);
       $add->bindParam(':venda',$venda);
       $add->bindParam(':entrega', $entrega);
       $add->bindParam(':valor', $valor);
       $add->bindParam(':pagamento', $pagamento);
       $add->bindParam(':obs', $obser);
 
       $add->execute();
       echo "ate aqui chegou";

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