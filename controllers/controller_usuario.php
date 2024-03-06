<?php

include_once("../models/model_usuario.php");
include("../conexao.php");
include("../bd/bd_usuario.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
    $id = $_POST['id'];
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $contacto = $_POST['contacto'] ?? '';

    if (!empty($nome) && !empty($email) && !empty($contacto)) {
        $usuario = new BD_Usuario();
        $resultado = $usuario->editarUsuario($id, $nome, $email, $contacto);

        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Edição feita com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao Editar!";

    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos!";

    }
    header("location:../index.php?r=editar-usuario&id=$id");
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $contacto = $_POST['contacto'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $status = 1;
    $is_admin = 0;

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($contacto)) {
        $dados = new Model_Usuario(null, $nome, $email, $senha, $is_admin, $status, $contacto);
        $usuario = new BD_Usuario();
        $resultado = $usuario->postUsuario($dados);


        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Cadastro feito com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao cadastrar!";

    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos!";

    }
    header("location:../index.php?r=cadastrar-usuario");

} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $dados = new BD_Usuario();

    $id_usuario = $_GET['id'];

    if (isset($_GET['delete'])) {
        $resultado = $dados->deleteUsuario($id_usuario);
        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Deleção feito com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao Deletar!";
    }
    header("location:../index.php?r=lista-usuario");
    exit();
} else {
    header("location:../index.php");
    exit();
}
?>