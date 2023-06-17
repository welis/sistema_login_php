<?php

include "protect.php";

?>
<!-- Exibe a saudação ao usuário logado e um link para fazer logout -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <h1>Olá, <?php echo $_SESSION['user']; ?></h1>

    <a href="logout.php">Sair</a>
</body>
</html>