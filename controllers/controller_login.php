<?php
include ("../conexao.php");
include ("../bd/bd_usuario.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty ($email) && !empty ($senha)) {
        $usuario = new BD_Usuario();
        $dados = $usuario->getLogin($email, $senha);

        if ($dados) {
            $statusConta = $usuario->getLoginStatus($email, $senha);
            if ($statusConta) {
                $_SESSION["email"] = $dados['email'];
                $_SESSION["nome"] = $dados['nome'];
                $_SESSION["id"] = $dados['id'];
                header("location: ../index.php");
                exit(); // Termina o script após redirecionar
            } else {
                $_SESSION['mensagem_erro'] = "A sua conta foi Bloqueada!";
                header("location: ../login.php");
            }

        } else {
            $_SESSION['mensagem_erro'] = "Email ou senha incorretos.";
            header("location: ../login.php");
        }
    } else {
        $_SESSION['mensagem_erro'] = "Por favor, preencha todos os campos.";
        header("location: ../login.php");
    }
}