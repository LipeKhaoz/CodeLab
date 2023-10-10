<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conecte-se ao banco de dados (substitua os valores)
    $conexao = new mysqli("localhost", "usuario", "senha", "nome_do_banco");

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Verifique se o email já está cadastrado
    $verificar_email = "SELECT id FROM users WHERE email = '$email'";
    $resultado = $conexao->query($verificar_email);

    if ($resultado->num_rows > 0) {
        header("Location: cadastro.php?erro=Email já cadastrado");
    } else {
        // Hash da senha antes de armazená-la
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Insira o novo usuário no banco de dados
        $inserir_usuario = "INSERT INTO users (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";
        if ($conexao->query($inserir_usuario) === TRUE) {
            header("Location: login.php"); // Redirecionar para a página de login após o cadastro bem-sucedido
        } else {
            echo "Erro ao cadastrar: " . $conexao->error;
        }
    }

    $conexao->close();
} else {
    header("Location: cadastro.php");
}
?>
