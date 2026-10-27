<?php
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function cabecalho($titulo) { ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($titulo) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Nunito:wght@500;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php }

function termos() { ?>
<details class="termos">
  <summary>Ler termos e condições de uso e privacidade</summary>
  <div class="termos-texto">
    <h3>1. Finalidade educativa</h3>
    <p>Este site é um projeto escolar. Ele existe somente para fins educativos, para estudar como funcionam cadastro, login e privacidade de rede. Não é um serviço comercial.</p>

    <h3>2. Dados que coletamos</h3>
    <ul>
      <li>Nome, e-mail, curso, ano e senha informados no cadastro.</li>
      <li>Nada além disso: sem rastreadores, sem anúncios e sem coleta de localização.</li>
    </ul>

    <h3>3. Como os dados são guardados</h3>
    <ul>
      <li>Ficam no banco MySQL do computador que hospeda o site (localhost), e não são enviados a terceiros.</li>
      <li>A senha é salva apenas como hash (<code>password_hash</code>). Nem o administrador consegue ler a senha original.</li>
      <li>Use uma senha criada só para este projeto, nunca a de e-mail, redes sociais ou banco.</li>
    </ul>

    <h3>4. Privacidade de rede na prática</h3>
    <ul>
      <li>Em <code>localhost</code> sem HTTPS, os dados não passam pela internet, mas em uma rede real seriam legíveis por quem estivesse no caminho. Por isso sites de verdade usam HTTPS.</li>
      <li>Ao abrir os jogos externos, você sai deste site. Os sites de destino enxergam seu endereço IP e dados do navegador e têm suas próprias políticas de privacidade, que não controlamos.</li>
    </ul>

    <h3>5. Uso permitido</h3>
    <p>Use apenas a sua própria conta e seus próprios dados. Não tente acessar contas de outras pessoas nem testar ataques contra este ou outros sites.</p>

    <h3>6. Seus direitos</h3>
    <p>Você pode pedir ao responsável pelo projeto a exclusão do seu cadastro a qualquer momento.</p>
  </div>
</details>
<div class="aceite">
  <input type="checkbox" id="aceito" name="aceito" value="1" required>
  <label for="aceito">Li e aceito os termos de uso e privacidade, ciente de que este site é somente para fins educativos.</label>
</div>
<?php }
