<?php
session_start();
if (isset($_SESSION["email"]))
    header("location: index.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recuperar Senha</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
            background: url('assets/images/angola.webp') no-repeat;
            background-size: cover;
            background-position: center;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .splash-container {
            background: rgba(255, 255, 255, 0.5);
            /* Adiciona um fundo branco transparente */
            backdrop-filter: blur(15px);
            /* Aplica um efeito de desfoque ao fundo */
            border-radius: 10px;
            /* Adiciona bordas arredondadas ao container */
            padding: 20px;
            /* Adiciona um pouco de espaço interno */
            max-width: 400px;
            /* Define a largura máxima do container */
            margin: 0 auto;
            /* Centraliza o container horizontalmente */
        }

        .card {
            background: transparent !important;
            /* Define o fundo do cartão como transparente */
            border: none !important;
            /* Remove a borda do cartão */
        }

        .card-body {
            padding: 0;
            /* Remove o preenchimento interno do corpo do cartão */
        }

        .card-footer {
            background: rgba(255, 255, 255, 0.5);
            /* Adiciona um fundo branco transparente ao rodapé do cartão */
            backdrop-filter: blur(15px);
            /* Aplica um efeito de desfoque ao fundo do rodapé */
            border-top: none !important;
            /* Remove a borda superior do rodapé */
            border-radius: 0 0 10px 10px;
            /* Adiciona bordas arredondadas apenas à parte inferior do rodapé */
        }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><a href="index.php"><img class="logo-img"
                        style="width: 200px; height 150px;" src="assets/images/turismo.png" alt="logo"></a><span
                    class="splash-description">Recupero o acesso a sua conta.</span>

                <?php
                if (isset($_SESSION['mensagem_sucesso'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    ' . $_SESSION['mensagem_sucesso'] . '
                                    </div>';
                    unset($_SESSION['mensagem_sucesso']);
                }
                if (isset($_SESSION['mensagem_erro'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    ' . $_SESSION['mensagem_erro'] . '
                                    </div>';
                    unset($_SESSION['mensagem_erro']);
                }
                ?>
            </div>
            <div class="card-body">

                <form method="post" action="processar_recuperacao.php" autocomplete="off">
                    <div class="form-group" style="margin-top: 10px;">
                        <input class="form-control form-control-lg" id="email" type="email" name="email"
                            placeholder="Email">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar Email de Recuperação</button>
                </form>
            </div>

        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>