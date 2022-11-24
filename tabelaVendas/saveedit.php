<?php

include "../config.php";

$dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);

//conferindo se o botao update foi clicado
if(!empty($_POST['Update'])){

//sselecioanando o id
$id = $_POST['id'];
/*$vendedor = $_POST['vendedor'];
$cliente = $_POST['cliente'];
$meio = $_POST['meio'];
$codigo = $_POST['codigo'];
$quantidade = $_POST['quantidade'];
$venda = $_POST['venda'];
$entrega = $_POST['entrega'];
$valor = $_POST['valor'];
$pagamento = $_POST['pagamento'];
$obs = $_POST['obs'];*/

//-----------------------------------------------------------------------------------------------------
//fazendo a atualizao do bd
$query = "UPDATE vendas  SET vendedor=:vendedor,cliente =:cliente , meio = :meio, codigo = :codigo, quantidade = :quantidade, venda =:venda, entrega =:entrega, valor =:valor, pagamento =:pagamento, obs =:obs   WHERE id = $id ";
$add = $conn->prepare($query);

//definindo onde fica cada atributo da tabela
$add->bindValue(':vendedor', $dados['vendedor'] );
$add->bindValue(':cliente', $dados['cliente'] );
$add->bindValue(':meio', $dados['meio'] );
$add->bindValue(':codigo', $dados['codigo'] );
$add->bindValue(':quantidade', $dados['quantidade'] );
$add->bindValue(':venda', $dados['venda'] );
$add->bindValue(':entrega', $dados['entrega'] );
$add->bindValue(':valor', $dados['valor'] );
$add->bindValue(':pagamento', $dados['pagamento'] );
$add->bindValue(':obs', $dados['obs'] );
$add->execute();

if($add->rowCount()){
    echo 'mensagem enviada';
}else{
    echo 'mesagem nao enviada';
}
}
//quando for dado o update retorna pra pagina do Banco de dados
header('Location: ../home/index.php')
// 
?>