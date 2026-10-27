<?php
session_start();
require __DIR__ . '/conexao.php';
require __DIR__ . '/helpers.php';

if (!empty($_SESSION['uid'])) { header('Location: jogos.php'); exit; }

$msg = '';
$ok  = isset($_GET['cadastro']);
if ($ok) { $msg = 'Cadastro feito! Entre com o seu e-mail e senha.'; }
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($_POST['aceito'])) {
        $msg = 'Aceite os termos para continuar.';
    } else {
        $st = $conn->prepare('SELECT id, nome, senha FROM usuarios WHERE email = ?');
        $st->bind_param('s', $email);
        $st->execute();
        $u = $st->get_result()->fetch_assoc();

        if ($u && password_verify($senha, $u['senha'])) {
            session_regenerate_id(true);
            $_SESSION['uid']  = $u['id'];
            $_SESSION['nome'] = $u['nome'];
            header('Location: jogos.php');
            exit;
        }
        $msg = 'E-mail ou senha incorretos.';
    }
}

cabecalho('Entrar | Cantinho dos Jogos');
?>
<div class="wrap estreito">
  <header>
    <h1>Cantinho dos Jogos</h1>
    <p>Entre para liberar os jogos.</p>
  </header>

  <section class="caixa" aria-labelledby="t-login">
    <h2 id="t-login">Entrar</h2>

    <?php if ($msg): ?>
      <div class="aviso <?= $ok ? 'ok' : 'erro' ?>" role="status"><?= h($msg) ?></div>
    <?php endif; ?>

    <form method="post" action="login.php">
      <label for="email">E-mail</label>
      <input id="email" name="email" type="email" required autocomplete="username" value="<?= h($email) ?>">

      <label for="senha">Senha</label>
      <input id="senha" name="senha" type="password" required autocomplete="current-password">

      <?php termos(); ?>

      <button type="submit">ENTRAR</button>
    </form>
    <p class="troca">Ainda não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
  </section>
</div>
</body>
</html>
