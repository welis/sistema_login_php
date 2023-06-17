<?php


// Verifica se a sessão está iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Destrói a sessão atual
session_destroy();

// Redireciona o usuário para a página de login
header("Location: index.php");

