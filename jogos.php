<?php
session_start();
require __DIR__ . '/helpers.php';

if (empty($_SESSION['uid'])) { header('Location: login.php'); exit; }

cabecalho('Jogos | Cantinho dos Jogos');
?>
<div class="wrap">
  <div class="topo">
    <span>Jogador: <strong><?= h($_SESSION['nome']) ?></strong></span>
    <a class="sair" href="logout.php">Sair</a>
  </div>

  <header>
    <h1>Escolha seu jogo</h1>
    <p>Jogos leves para uma pausa rápida.</p>
  </header>

  <section class="jogos" aria-label="Jogos">
    <a class="quadro dbz" href="https://dragonballbt3.online" target="_blank" rel="noopener noreferrer">
      <div class="aura"></div>
      <div class="conteudo">
        <div class="esferas" aria-hidden="true">
          <?php for ($i = 1; $i <= 7; $i++): ?>
            <span class="esfera"><?= str_repeat('★', $i > 4 ? 2 : 1) ?></span>
          <?php endfor; ?>
        </div>
        <h3>Dragon Ball BT3</h3>
        <p>Reúna as sete esferas e entre na luta dos guerreiros Z.</p>
        <span class="botao">JOGAR</span>
      </div>
    </a>

    <a class="quadro mine" href="https://eaglercraft.com/play" target="_blank" rel="noopener noreferrer">
      <div class="grama"></div>
      <div class="terra"></div>
      <div class="creeper" aria-hidden="true"></div>
      <div class="conteudo">
        <h3>Eaglercraft</h3>
        <p>Minecraft direto no navegador. Construa, explore e sobreviva.</p>
        <span class="botao">JOGAR</span>
      </div>
    </a>
  </section>

  <p class="nota">Os jogos abrem em outra aba e são sites de terceiros, com políticas de privacidade próprias. Não use neles a senha deste cadastro.</p>
</div>
</body>
</html>
