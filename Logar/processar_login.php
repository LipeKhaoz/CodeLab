<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conecte-se ao banco de dados (substitua os valores)
    $conexao = new mysqli("localhost", "usuario", "senha", "nome_do_banco");

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Consulta para verificar se o usuário existe
    $sql = "SELECT id, nome, senha FROM users WHERE email = '$email'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["usuario_id"] = $row["id"];
            $_SESSION["usuario_nome"] = $row["nome"];
            header("Location: perfil.php"); // Redirecionar para a página de perfil após o login
        } else {
            header("Location: login.php?erro=Senha incorreta");
        }
    } else {
        header("Location: login.php?erro=Usuário não encontrado");
    }

    $conexao->close();
} else {
    header("Location: login.php");
}
?>