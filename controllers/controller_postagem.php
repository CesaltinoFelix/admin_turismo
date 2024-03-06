<?php

include_once("../models/model_postagem.php");
include ("../controllers/upload_files.php");
include("../conexao.php");
include("../bd/bd_postagem.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'] ?? '';
    $resumo = $_POST['resumo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    if (!empty($titulo) && !empty($descricao) && !empty($resumo)) {
        // $usuario = new BD_Usuario();
        // $resultado = $usuario->editarUsuario($id, $nome, $email, $contacto);

        // if ($resultado === TRUE)
        //     $_SESSION['mensagem_sucesso'] = "Edição feita com sucesso!";
        // else
        //     $_SESSION['mensagem_erro'] = "Falha ao Editar!";

    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos!";

    }
    header("location:../index.php?r=editar-postagem&id=$id");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $titulo = $_POST['titulo'] ?? '';
    $resumo = $_POST['resumo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $texto_enfase = $_POST['texto_enfase'] ?? '';
    $data = date('Y-m-d');
    $img_capa = uploadImagem($_FILES["fileToUpload"]);

    if (!empty($titulo) && !empty($descricao) && !empty($resumo)) {
        $postagem = new BD_Postagem();
        $resultado = $postagem->insertPostagem($titulo, $data, $resumo, $descricao, $img_capa, $texto_enfase);

        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Cadastro feito com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao cadastrar!";

    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos!";

    }
    header("location:../index.php?r=cadastrar-post");

} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $dados = new BD_Postagem();

    $id_postagem = $_GET['id'];

    if (isset($_GET['delete'])) {
        $resultado = $dados->deletePostagem($id_postagem);
        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Deleção feito com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao Deletar!";
    }
    header("location:../index.php?r=lista-post");
    exit();
} else {
    header("location:../index.php");
    exit();
}
?>