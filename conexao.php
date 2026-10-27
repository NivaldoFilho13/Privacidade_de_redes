<?php
$host  = 'localhost';
$user  = 'root';
$pass  = '';
$banco = 'site_jogos';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $banco);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    die('Não foi possível conectar ao banco. Verifique se o MySQL está ligado no XAMPP e se o banco.sql foi importado.');
}
