<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

// O código abaixo só será executado se o usuário estiver autenticado

$nome = $_SESSION["usuario_nome"];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
</head>
<body>
    <h2>Perfil de <?php echo $nome; ?></h2>
    <p>Esta é a página do perfil do usuário. Aqui você pode mostrar informações pessoais e permitir que o usuário faça alterações.</p>
    <a href="logout.php">Sair</a>
</body>
</html>
