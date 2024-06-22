<?php
// Recuperando dados do formulário
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$link = $_POST["link"];
$categoria = $_POST["categoria"];

// Pasta onde será salva a imagem
$pasta = "img/";

// Recuperando informações do arquivo de imagem
$nomeDoArquivo = $_FILES['img']['name'];
$nomeTemporario = $_FILES['img']['tmp_name'];

// Gerando um nome único para o arquivo de imagem
$extensao = pathinfo($nomeDoArquivo, PATHINFO_EXTENSION);
$nomeNovo = uniqid() . '.' . $extensao;

// Movendo o arquivo para a pasta de destino
$caminhoCompleto = $pasta . $nomeNovo;
move_uploaded_file($nomeTemporario, $caminhoCompleto);

// Incluindo o arquivo de conexão com o banco de dados
include "conexao.php";

// Preparando os dados para inserção no banco de dados
$imagem = $nomeNovo;

// Evitando SQL Injection utilizando prepared statements
$sql = "INSERT INTO tb_jogos (img, titulo, descricao, link, categoria) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $imagem, $titulo, $descricao, $link, $categoria);
mysqli_stmt_execute($stmt);

// Verificando se ocorreu algum erro na execução da consulta
if (mysqli_stmt_error($stmt)) {
    echo "Erro: " . mysqli_stmt_error($stmt);
} else {
    // Fechando a conexão com o banco de dados
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    
    // Redirecionando para a página inicial
    header("Location: index.php");
    exit();
}
?>
