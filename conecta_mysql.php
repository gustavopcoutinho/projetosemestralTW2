<?php
 // abrir conexao e selecionar o banco de dados
 // CONFERIR A PORTA ABERTA PARA MYSQL NO MACKENZIE - 3308
 $conexao = mysqli_connect("127.0.0.1:3308","root","","onmack");
 
 // tratamento de erros
 if (mysqli_connect_errno())
 {
 echo "Não foi possível conectar: " . mysqli_connect_error();
 } 
?>
