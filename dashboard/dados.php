<?php
include "../config.php";
        $quer_cont1 = "SELECT bairro AS bairros,COUNT(bairro) AS qntvez  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 1";
        $result1 = $conn->prepare($quer_cont1);
        $result1->execute();
        $qntvez1 = array();
        $bairro1 = array();
          while($row_cont1 = $result1->fetch(PDO::FETCH_ASSOC)){
              $qntvez1 = $row_cont1['qntvez'];
              $bairro1 = $row_cont1['bairros'];
        };

            $quer_cont2 = "SELECT bairro AS bairros,COUNT(bairro) AS qntvez  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 2";
            $result2 = $conn->prepare($quer_cont2);
            $result2->execute();
            $qntvez2 = array();
            $bairro2 = array();
            while($row_cont2 = $result2->fetch(PDO::FETCH_ASSOC)){
              $qntvez2 = $row_cont2['qntvez'];
              $bairro2 = $row_cont2['bairros'];
            };

                $quer_cont3 = "SELECT bairro AS bairros,COUNT(bairro) AS qntvez  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 3";
                $result3 = $conn->prepare($quer_cont3);
                $result3->execute();
                $qntvez3 = array();
                $bairro3 = array();
                while($row_cont3 = $result3->fetch(PDO::FETCH_ASSOC)){
                  $qntvez3 = $row_cont3['qntvez'];
                  $bairro3 = $row_cont3['bairros'];
                };

                      $quer_cont4 = "SELECT bairro AS bairros,COUNT(bairro) AS qntvez  FROM cadastro GROUP BY bairro HAVING COUNT(bairro) >= 1 ORDER BY count(bairro) DESC LIMIT 4";
                      $result4 = $conn->prepare($quer_cont4);
                      $result4->execute();
                      $qntvez4 = array();
                      $bairro4 = array();
                      while($row_cont4 = $result4->fetch(PDO::FETCH_ASSOC)){
                        $qntvez4 = $row_cont4['qntvez'];
                        $bairro4 = $row_cont4['bairros'];
                        };     ?>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>


$(document).ready(function(){
            $.ajax({
              url:'dashboard/index.php',
              method:'POST',
              type:'json',
              data: new FormData(this),
              success:function(response){
                $("").html(response);
              }
            })
         
        })

</script>

