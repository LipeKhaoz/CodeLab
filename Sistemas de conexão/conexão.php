<?php
$hostname = "seu_hostname";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Cria a conexão
$conexao = new mysqli($hostname, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
