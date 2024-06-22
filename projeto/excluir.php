<?php
include "conexao.php";
$id = $_GET['id'];

$sql = "delete from tb_jogos where id=$id";
mysqli_query($conexao, $sql);
mysqli_close($conexao);

header('location:admin.php');
?>