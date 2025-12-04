<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
  Se o usuário NÃO estiver logado, 
  o header é interrompido aqui e o menu NÃO aparece
*/
if (!isset($_SESSION['usuario_id'])) {
    return;
}

// base do projeto
$base = "/mural/";

// foto do usuário
$foto = $_SESSION['usuario_foto'] ?? null;

// caminho absoluto para a foto
$fotoPerfil = $foto 
    ? $base . "uploads/" . $foto 
    : $base . "uploads/default.png";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mural de Recados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f4f4;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-box img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        nav {
            background: #343a40;
            padding: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .menu a {
            color: #fff;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav .menu a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<nav>
    <div class="menu">
        <a href="<?= $base ?>public/index.php">🏠 Início</a>
        <a href="<?= $base ?>public/criar.php">➕ Criar Recado</a>
        <a href="<?= $base ?>public/logout.php">🚪 Sair</a>
    </div>

    <div class="user-box text-white">
        <span><?= htmlspecialchars($_SESSION['usuario_nome'] ?? "Usuário") ?></span>
        <img src="<?= $fotoPerfil ?>" alt="Foto de perfil">
    </div>
</nav>
