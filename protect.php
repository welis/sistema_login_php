<?php


// Verifica se a sessão já foi iniciada, caso contrário, inicia a sessão
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o usuário está autenticado, caso contrário, redireciona para a página de login
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

