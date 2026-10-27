# Cantinho dos Jogos

Site simples com tema de jogos leves, feito em PHP e MySQL para rodar no XAMPP. Tem login, cadastro, termos de privacidade e uma página interna com links para dois jogos externos.

**Projeto escolar, somente para fins educativos** sobre cadastro, login e privacidade de rede.

## Como rodar

1. Ligue o **Apache** e o **MySQL** no painel do XAMPP.
2. Copie esta pasta para `C:\xampp\htdocs\site_jogos`.
3. Abra `http://localhost/phpmyadmin`, vá em **Importar** e envie o `banco.sql`.
4. Acesse `http://localhost/site_jogos/`.

A conexão usa o padrão do XAMPP (usuário `root`, sem senha). Se o seu MySQL tem senha, altere em `conexao.php`.

## Fluxo do site

`index.php` → `login.php` (com termos) → `jogos.php` → links externos

- **login.php**: entrada com e-mail e senha. Exige aceitar os termos.
- **cadastro.php**: nome, e-mail, curso (DDS, Enfermagem, Agropecuária, Administração), ano e senha.
- **jogos.php**: página interna, só abre com login. Tem os quadros dos jogos.
- **logout.php**: encerra a sessão.

## Arquivos

| Arquivo | Função |
|---|---|
| `banco.sql` | Cria o banco `site_jogos` e a tabela `usuarios` |
| `conexao.php` | Conexão com o MySQL |
| `helpers.php` | Cabeçalho comum, escape de HTML e texto dos termos |
| `style.css` | Visual do site |
| `index.php`, `login.php`, `cadastro.php`, `jogos.php`, `logout.php` | Páginas |

## Privacidade e segurança

- Senhas salvas com `password_hash`, nunca em texto puro.
- Consultas ao banco com *prepared statements*.
- Sessão renovada no login (`session_regenerate_id`).
- Rodando em `localhost` sem HTTPS. Em um servidor de verdade, use HTTPS.
- Use uma senha criada só para este projeto.

## Créditos

Este projeto **não é afiliado** aos jogos abaixo nem aos seus detentores de direitos. Os links apenas levam a sites de terceiros, que têm suas próprias políticas de privacidade.

**Dragon Ball BT3** (<https://dragonballbt3.online>)
- Site e jogo hospedados por terceiros. Os créditos da versão online pertencem aos responsáveis pelo site.
- *Dragon Ball* é criação de Akira Toriyama. Direitos de Shueisha, Toei Animation e Bandai Namco.
- *Dragon Ball Z: Budokai Tenkaichi 3* foi desenvolvido pela Spike e publicado pela Atari e pela Bandai Namco.

**Eaglercraft** (<https://eaglercraft.com/play>)
- Port não oficial de Minecraft para o navegador, criado por lax1dude, com contribuições da comunidade.
- *Minecraft* é de Mojang Studios / Microsoft. Eaglercraft não é afiliado nem endossado pela Mojang.

Os elementos visuais de Dragon Ball (esferas) e de Minecraft (blocos e creeper) neste site foram desenhados em CSS apenas como decoração temática.

## Fontes

[Press Start 2P](https://fonts.google.com/specimen/Press+Start+2P) e [Nunito](https://fonts.google.com/specimen/Nunito), via Google Fonts (licença SIL Open Font).
