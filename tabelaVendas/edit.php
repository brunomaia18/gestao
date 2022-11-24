<?php
include "../config.php";


if(!empty($_GET['id'])){

  $dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);
  $id=$_GET['id'];
  $query = "SELECT * FROM vendas WHERE id=$id";
  $add = $conn->prepare($query);
  $add->execute();
  echo "<br>";
  if($id > 0){
      while ($row_user = $add->fetch(PDO::FETCH_OBJ)){
          $id =$row_user->id;
          $vendedor=$row_user->vendedor;
          $cliente = $row_user->cliente;
          $meio = $row_user->meio;
          $codigo = $row_user->codigo;
          $quantidade = $row_user->quantidade;
          $venda = $row_user->venda;
          $entrega = $row_user->entrega;
          $valor = $row_user->valor;
          $pagamento = $row_user->pagamento;
          $obs = $row_user->obs;
          
      }
     // print_r($cliente);

  if($add->rowCount()){
      //echo 'mensagem enviada';
  }else{
      echo 'mesagem nao enviada';
  }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
        <form method="POST" id="form" action="saveedit.php" class="row gy-2 gx-3 align-items-center">

        <div class="col-md-4" >
                
                <input type="text" id="id" value="<?php echo $id ?>" name="id"   class="form-control" hidden>
        </div>
            <div class="col-md-4">
                <label for="Vendedor" class="form-label">Vendedor</label>
                <input type="text" id="vendedor" value="<?php echo $vendedor ?>" name="vendedor" placeholder="Digite o nome de quem recebeu o pedido"  class="form-control">
            </div>

            <div class="col-md-4">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" value="<?php echo $cliente ?>" class="form-control" name="cliente"  placeholder="Digite o nome do cliente aqui">
            </div>
            

            <div class="col-md-4 col-auto ">
                <select name="meio" value="<?php echo $meio ?>"  class="form-select">
                    <option selected>Por onde achou a loja</option>
                    <option name="meio" value="Instagram">Instagram</option>
                    <option name="meio" value="Facebook">Facebook</option>
                    <option name="meio" value="Google">Google</option>
                    <option name="meio" value="Ifood">Ifood</option>
                    <option name="meio" value="Indicacao">Indicacao</option>
                    <option name="meio" value="Outros">Outro</option>
                </select>
            </div>

            <br>

            <div class="col-md-6 col-auto">
                <label for="codigo" class="form-label" >codigo</label>
                <input type="text" class="form-control" value="<?php echo $codigo ?>" id="codigo" name="codigo" placeholder="Digite a rua e numero">
            </div>

            <div class="col-md-2 col-auto">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" value="<?php echo $quantidade ?>" name="quantidade" placeholder="Quantidade do produto">
            </div>

            <div class="col-md-2 col-auto">
                <label for="venda" class="form-label">Dia da venda</label>
                <input type="date" class="form-control" id="venda" value="<?php echo $venda ?>" name="venda">
            </div>

            <div class="col-md-2 col-auto">
                <label for="Entrega" class="form-label">Dia da Entrega</label>
                <input type="date" class="form-control" value="<?php echo $entrega ?>" id="entrega" name="entrega">
            </div>

            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingInputGroup">Valor a ser pago</label>
                <div class="input-group">
                    <div class="input-group-text">R$</div>
                        <input type="number" class="form-control" id="valor" value="<?php echo $valor ?>" name="valor" placeholder="Digite o valor a pagar"  min="0" max="100" step=".01">
                    </div>
             </div>

             <div class="col-md-6 col-auto ">
                <select name="pagamento" value="<?php echo $pagamento ?>" class="form-select">
                    <option selected >Forma de Pagamento</option>
                    <option  name="pagamento"value="Ifood">Ifood</option>
                    <option  name="pagamento"value="A vista">A vista</option>
                    <option  name="pagamento"value="Pix">Pix</option>
                    <option  name="pagamento" value="Debito">Debito</option>
                    <option  name="pagamento" value="Credito 1x">Credito 1x</option>
                    <option   name="pagamento" value="Credito 2x">Credito 2x</option>
                </select>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="form-floating ">
                <input class="form-control"  value="<?php echo $obs ?>"name='obs' placeholder="Digite" id="obs" style="height: 100px;">
                <label for="obs">Observacao</label>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" name='Update' value="Enviar" id="Update" class='btn btn-primary'>
                
            </div>
            

        </form>
    </div>

    
</body>
</html>