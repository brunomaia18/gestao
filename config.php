<?php
$servidor = 'localhost';
$username = 'root';
$password = '';
$name_banco = 'database';

try{
    $conn = new PDO("mysql:host = $servidor;dbname=". $name_banco,$username,$password);

}catch(PDOException $err){
    echo "Erro na conexao";
    $err->getMessage();
}
?>