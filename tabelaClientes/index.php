<?php
 include "../config.php";

 $query_usuario = 'SELECT id,vendedor,cliente,telefone,cidade,bairro,endereco,meio,codigo,quantidade,venda,entrega,valor,pagamento,obs FROM cadastro ';
 $result_user = $conn->prepare($query_usuario);
 $result_user->execute();
 
 


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
  background: #212529;
}
div{
    display: flex;
}

table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
}

th {
  position: sticky;
  top: 0;
  background: red;
}
    </style>
</head>
<body>
    <div class="table-responsive-sm">
<table class="table table-sm table-dark">
        <thead>
                <tr>
                   
                    <th id='id' scope="col">ID</th>
                    <th class ='vendedor'scope="col">vendedor</th>
                    <th class ='cliente'scope="col">Clientes</th>
                    <th class='telefone' scope="col">Telefone</th>
                    <th class='cidade' scope="col">Cidade</th>
                    <th class='bairro' scope="col">Bairro</th>
                    <th class='endereco' scope="col">Endereço</th>
                    <th class='meio' scope="col">Meio</th>
                    <th class='codigo' scope="col">Codigo</th>
                    <th class='quantidade' scope="col">Quantidade</th>
                    <th class='venda' scope="col">Venda</th>
                    <th class='entrega' scope="col">Entrega</th>
                    <th class='valor' scope="col">Valor</th>
                    <th class='pagamento' scope="col">Pagamento</th>
                    <th class='obs' scope="col">OBS</th>
                    <th scope="col">...</th>
                   
                </tr>
                
        </thead>
        <tbody>
            <?php
            if(($result_user) AND ($result_user->rowCount() != 0)){
              while ($row_user = $result_user->fetch(PDO::FETCH_OBJ)){
                //com o $row-user->id mostro o id da venda
                echo "<tr>";
                echo  "<td class='idbd'>" .$row_user->id. "</td>" ;
                echo "<br>";
                echo  "<td class='vendedordb'>" .$row_user->vendedor. "</td>" ;
                echo  "<td class='clientedb'>" .$row_user->cliente. "</td>" ;
                echo  "<td class='telefonedb'>" .$row_user->telefone. "</td>" ;
                echo  "<td class='cidadedb'>" .$row_user->cidade. "</td>" ;
                echo  "<td class='bairrodb'>" .$row_user->bairro. "</td>" ;
                echo  "<td class='enderecodb'>" .$row_user->endereco. "</td>" ;
                echo  "<td class='meiodb'>" .$row_user->meio. "</td>" ;
                echo  "<td class='codigodb'>" .$row_user->codigo. "</td>" ;
                echo  "<td class='quantidadedb'> " .$row_user->quantidade. "</td>" ;
                echo  "<td class='vendadb'>" .$row_user->venda. "</td>" ;
                echo  "<td class='entregadb'>" .$row_user->entrega. "</td>" ;
                echo  "<td class='valordb'>" .$row_user->valor. "</td>" ;
                echo  "<td class='pagamentodb'>" .$row_user->pagamento. "</td>" ;
                echo  "<td class='obsdb'>" .$row_user->obs. "</td>" ;
               echo "<td  ><a class='btn1 bnt-primary' href='edit.php?id=$row_user->id'>
               <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
               <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
           </svg> </a>
           <a class='btn2 btn-sm bnt-red' href='delete.php?id=$row_user->id' style='background:red;'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
           <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
          </svg></a> </td> ";
                echo "</tr>";
                 
            }}


            ?>

        </tbody>
        </div>
</body>
</html>