<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<body>
    <?php include_once "conexao.php";


    /**
     * Verifica se o formulário de login foi submetido e se os campos foram preenchidos corretamente.
     * Se os campos estiverem preenchidos, a função verifica se as credenciais de login são válidas.
     * Se as credenciais forem válidas, a função inicia uma sessão e redireciona o usuário para a página de painel.
     * Se as credenciais não forem válidas, a função exibe uma mensagem de erro.
     */
    if (isset($_POST['email']) || isset($_POST['password'])) {
        if(strlen($_POST['email']) == 0 || strlen($_POST['password']) == 0){
            echo "<script>alert('Preencha todos os campos!')</script>";
        }else{

            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM login WHERE usuario = :email AND senha = :password";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                if(!isset($_SESSION)){
                    session_start();
                    $_SESSION['user'] = $email;
                    header("Location: painel.php");
                }
            } else {
                echo "<script>alert('Email ou senha incorretos!')</script>";
            }
        }
    }


    ?>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in</h2>
                    <p class="w-lg-50">Sistema de login para fim de estudos.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="email" placeholder="Email" /></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</body>
</html>