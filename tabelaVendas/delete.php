<?php
 include_once("../config.php");
if(!empty($_GET['id'])){
   // $dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);
    $id=$_GET['id'];
    $query = "SELECT * FROM vendas WHERE id=$id";
    $add = $conn->prepare($query);
    $add->execute();
    echo "<br>";
    if($id > 0){
     $sqldelete = "DELETE FROM vendas WHERE id =$id";
     $delete = $conn->prepare($sqldelete);
     $delete->execute();
        }
}
header('Location: ../home/index.php');
 ?>