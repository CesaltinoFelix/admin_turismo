<?php
include("../conexao.php");
include("../bd/bd_usuario.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        $usuario = new BD_Usuario();
        $dados = $usuario->getLogin($email, $senha);

        if ($dados) {
            session_start();
            $_SESSION["email"] = $dados['email'];
            $_SESSION["nome"] = $dados['nome'];
            $_SESSION["id"] = $dados['id'];
            header("location: ../index.php");
            exit(); // Termina o script após redirecionar
        } else {
            echo "Email ou senha incorretos.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}