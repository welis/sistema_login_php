<?php

$usario = "root";
$senha = "";
$host = "localhost";
$banco = "sistema_login";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}