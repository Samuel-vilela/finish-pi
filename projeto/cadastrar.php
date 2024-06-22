<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELA DE CADASTRO</title>
    <link rel="stylesheet" href="cadastrar.css">
</head>
<body>
<h1>Cadastro</h1>

<form method="Post" action="salvar.php" enctype="multipart/form-data" id="cadastroForm">
    <div>
        <label for="img">Imagem:</label>
        <input type="file" id="img" name="img" accept="img/*">
    </div>
    <div>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo">
    </div>
    <div>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea>
    </div>
    <div>
        <label for="link">Link:</label>
        <input type="url" id="link" name="link">
    </div>
    <div>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="anime">Jogos de Anime</option>
            <option value="classicos">Jogos Clássicos</option>
        </select>
    </div>
    <button type="submit">Cadastrar</button>
</form>
</body>
</html>