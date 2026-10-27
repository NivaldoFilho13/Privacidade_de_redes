<?php
session_start();
require __DIR__ . '/conexao.php';
require __DIR__ . '/helpers.php';

if (!empty($_SESSION['uid'])) { header('Location: jogos.php'); exit; }

$cursos = ['dds' => 'DDS', 'enf' => 'Enfermagem', 'agro' => 'Agropecuária', 'adm' => 'Administração'];
$anos   = [1 => '1º ano', 2 => '2º ano', 3 => '3º ano'];

$msg = '';
$v   = ['nome' => '', 'email' => '', 'curso' => '', 'ano' => 0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v['nome']  = trim($_POST['nome'] ?? '');
    $v['email'] = trim($_POST['email'] ?? '');
    $v['curso'] = $_POST['curso'] ?? '';
    $v['ano']   = (int)($_POST['ano'] ?? 0);
    $senha      = $_POST['senha'] ?? '';

    if (empty($_POST['aceito'])) {
        $msg = 'Aceite os termos para se cadastrar.';
    } elseif ($v['nome'] === '' || !filter_var($v['email'], FILTER_VALIDATE_EMAIL)) {
        $msg = 'Preencha o nome e um e-mail válido.';
    } elseif (!isset($cursos[$v['curso']]) || !isset($anos[$v['ano']])) {
        $msg = 'Escolha o curso e o ano.';
    } elseif (strlen($senha) < 6) {
        $msg = 'A senha precisa ter pelo menos 6 caracteres.';
    } else {
        try {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $st = $conn->prepare('INSERT INTO usuarios (nome, email, curso, ano, senha) VALUES (?, ?, ?, ?, ?)');
            $st->bind_param('sssis', $v['nome'], $v['email'], $v['curso'], $v['ano'], $hash);
            $st->execute();
            header('Location: login.php?cadastro=ok');
            exit;
        } catch (mysqli_sql_exception $e) {
            $msg = ($e->getCode() === 1062) ? 'Esse e-mail já está cadastrado.' : 'Erro ao salvar. Tente de novo.';
        }
    }
}

cabecalho('Cadastro | Cantinho dos Jogos');
?>
<div class="wrap estreito">
  <header>
    <h1>Cantinho dos Jogos</h1>
    <p>Crie sua conta de jogador.</p>
  </header>

  <section class="caixa" aria-labelledby="t-cad">
    <h2 id="t-cad">Cadastro</h2>

    <?php if ($msg): ?>
      <div class="aviso erro" role="status"><?= h($msg) ?></div>
    <?php endif; ?>

    <form method="post" action="cadastro.php" autocomplete="off">
      <label for="nome">Nome</label>
      <input id="nome" name="nome" maxlength="100" required value="<?= h($v['nome']) ?>">

      <label for="email">E-mail</label>
      <input id="email" name="email" type="email" maxlength="150" required value="<?= h($v['email']) ?>">

      <div class="linha">
        <div>
          <label for="curso">Curso</label>
          <select id="curso" name="curso" required>
            <option value="">Selecione</option>
            <?php foreach ($cursos as $k => $nomeCurso): ?>
              <option value="<?= h($k) ?>" <?= $v['curso'] === $k ? 'selected' : '' ?>><?= h($nomeCurso) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label for="ano">Ano</label>
          <select id="ano" name="ano" required>
            <option value="">Selecione</option>
            <?php foreach ($anos as $k => $nomeAno): ?>
              <option value="<?= $k ?>" <?= $v['ano'] === $k ? 'selected' : '' ?>><?= h($nomeAno) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <label for="senha">Senha</label>
      <input id="senha" name="senha" type="password" minlength="6" required autocomplete="new-password">

      <?php termos(); ?>

      <button type="submit">CRIAR CONTA</button>
    </form>
    <p class="troca">Já tem conta? <a href="login.php">Entrar</a></p>
  </section>
</div>
</body>
</html>
