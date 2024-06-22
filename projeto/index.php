<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PÁGINA INICIAL</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Inclui o arquivo de conexão com o banco de dados
include "conexao.php";

// Função para escapar strings
function safe($conexao, $str) {
    return mysqli_real_escape_string($conexao, $str);
}
?> 
  <!--  Menu - principal -->
<header>
    <nav>
      <a class="logo" href="index.html">Finish Him</a>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
        <div class="line4"></div>
      </div>
      <ul class="nav-list">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a href="#cards">Cards</i></a>
        </li>
        <li>
          <a href="#sobre-nos">Sobre nós</a>
        </li>
        <li>
          <a href="/">Login</a>
        </li>
      </ul>
    </nav>
  </header> 
               <!-- --  X -- -->
               <!-- slide carrosel -->
  <section class="image-slider">
    <div class="seta-esquerda">
      <img src="img/seta-esquerda.png" alt="seta para esquerda">
    </div>
    <div class="seta-direita">
      <img src="img/seta-direita.png" alt="seta para direita">
    </div>
    <div class="rubrica">
      <h1>MORTAL KOMBAT 1</h1>
      <p>
        Mortal Kombat 1, lançado em 2023, é um reboot da série icônica de jogos de luta. Desenvolvido pela NetherRealm
        Studios, o jogo se passa na nova linha do tempo criada por Liu Kang após sua ascensão à divindade em Mortal
        Kombat 11.
      </p>
    </div>
  </section>
               <!--  x   --> 

   <div class="divisor-cards">
    <h1>Lendas consagradas</h1>
    <h3>Conheça os verdadeiros titãs dentre os jogos de luta que já estão sob os holofotes há décadas.</h3>
  </div>

  <!-- Espaço dos cards  -->
  <div class="card-container" id="cards">
    <div class="card1" id="card1">
      <a href="card1.html"><img src="img/card-mortal.jpg" class="imagem-card1" alt=""></a>
    </div>
    <div class="card2" id="card2">
      <a href="card2.html"><img src="img/tekken-card.jpg" class="imagem-card2" alt=""></a>
    </div>
    <div class="card3" id="card3">
      <a href="card3.html"><img src="img/download.jpg" class="imagem-card3" alt=""></a>
    </div>
    <div class="card4" id="card4">
      <a href="card4.html"><img src="img/card-street.jpg" class="imagem-card4" alt=""></a>
    </div>
    <div class="card5" id="card5">
      <a href="card5.html"><img src="img/card-samurai.jpg" class="imagem-card5" alt=""></a>
    </div>
  </div> 
  <!--   x    -->

  <div class="divisor-cards2">
    <img src="img/fire.png" alt="" width="100px">
    <h5>Jogos de luta em estilo anime</h5>
    <h1>Embates estilosos</h1>
    <h3>A paixão japonesa por competição em arcades, animação feita a mão e personagens grandiosos se junta aqui.</h3>
  </div>

<div class="cards-container">
    <?php
    // Consulta SQL para buscar jogos de anime
    $sql_anime = "SELECT * FROM tb_jogos WHERE categoria = 'anime' ORDER BY id DESC";
    $resultado_anime = mysqli_query($conexao, $sql_anime);

    // Verifica se há resultados
    if (mysqli_num_rows($resultado_anime) > 0) {
        while ($produto = mysqli_fetch_assoc($resultado_anime)) {
    ?>
        <div class="card">
            <img src="img/<?= safe($conexao, $produto['img']); ?>" alt="Img 1">
            <div class="card-content">
                <h3><?= safe($conexao, $produto['titulo']); ?></h3>
                <p><?= safe($conexao, $produto['descricao']); ?></p>
                <a href="<?= safe($conexao, $produto['link']); ?>"> Adquira Agora </a>
            </div>
        </div>
    <?php
        }
    } else {
        echo "<p>Nenhum jogo de anime encontrado.</p>";
    }
    ?>
</div>


<div class="cards-container">

    <?php
    // Consulta SQL para buscar jogos clássicos
    $sql_classicos = "SELECT * FROM tb_jogos WHERE categoria = 'classicos' ORDER BY id DESC";
    $resultado_classicos = mysqli_query($conexao, $sql_classicos);
    // Verifica se há resultados
    if (mysqli_num_rows($resultado_classicos) > 0) {
        while ($produto = mysqli_fetch_assoc($resultado_classicos)) {
    ?>
        <div class="card">
            <img src="img/<?= safe($conexao, $produto['img']); ?>" alt="Img 2">
            <div class="card-content">
                <h3><?= safe($conexao, $produto['titulo']); ?></h3>
                <p><?= safe($conexao, $produto['descricao']); ?></p>
                <a href="<?= safe($conexao, $produto['link']); ?>"> Adquira Agora </a>
            </div>
        </div>
    <?php
        }
    } else {
        echo "<p>Nenhum jogo clássico encontrado.</p>";
    }
    ?>
</div> 

<div class="divisor-cards4">
    <h5>Personagens iconicos</h5>
    <h1>Estrelas</h1>
    <h3>Esses personagens lendários, e muitos outros, <br>
      pavimentaram o caminho para o universo dos jogos de luta que conhecemos hoje.</h3>
  </div>
 
  <div class="quem-somos" id="sobre-nos">
    <h1>Projeto integrador TI 22 </h1>
    <h2>Codinome: FINISHI HIM</h2>
    <h3>
      O Projeto Integrador TI 22, codinome "Finish Him", surge como uma proposta audaciosa para os amantes dos jogos de
      luta. Combinando expertise em tecnologia da informação e a paixão pelo universo dos jogos, nossa equipe está
      empenhada em desenvolver uma plataforma que ofereça uma experiência única de combate virtual. Inspirados pelos
      clássicos e pela adrenalina dos confrontos digitais, nosso objetivo é criar uma arena virtual onde jogadores
      possam testar suas habilidades, competindo em batalhas emocionantes e desafiadoras. "Finish Him" não é apenas um
      projeto; é uma promessa de mergulhar nos universos fantásticos dos jogos de luta, oferecendo aos jogadores uma
      plataforma dinâmica e envolvente para testar suas habilidades e dominar a arte do combate virtual. Junte-se a nós
      nesta jornada emocionante enquanto trabalhamos para tornar essa visão uma realidade.
      <br>
    </h3>
  </div> 

  <footer class="footer">
    <div class="container-footer">
      <p>&copy; 2024 Todos os direitos reservados</p>
    </div>
  </footer>
<?php
// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?> 

<script src="app.js"></script>

</body>
</html>
