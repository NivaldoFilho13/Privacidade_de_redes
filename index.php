<?php
session_start();
header('Location: ' . (empty($_SESSION['uid']) ? 'login.php' : 'jogos.php'));
exit;
