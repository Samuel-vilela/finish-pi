<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Tabela de Cadastros</h1>

    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Link</th>
                <th>Categoria</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // Inclui o arquivo de conexão com o banco de dados
            include "conexao.php";
            
            // Consulta SQL para selecionar todos os registros da tabela tb_jogos ordenados por ID decrescente
            $sql = "SELECT * FROM tb_jogos ORDER BY id DESC";
            $resultado = mysqli_query($conexao, $sql);

            // Loop para iterar sobre os resultados da consulta
            while ($produto = mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <!-- Célula com a imagem -->
                    <td><?= $produto['img']; ?></td>
                    
                    <!-- Célula com o título -->
                    <td><?= $produto['titulo']; ?></td>
                    
                    <!-- Célula com a descrição -->
                    <td><?= $produto['descricao']; ?></td>
                    
                    <!-- Célula com o link -->
                    <td><?= $produto['link']; ?></td>
                    
                    <!-- Célula com a categoria -->
                    <td><?= $produto['categoria']; ?></td>
                    
                    <!-- Célula com o botão Excluir -->
                    <td>
                        <!-- Formulário para enviar o ID do jogo a ser excluído -->
                        <form action="excluir.php" method="get">
                            <input type="hidden" name="id" value="<?= $produto['id']; ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>
</html>
