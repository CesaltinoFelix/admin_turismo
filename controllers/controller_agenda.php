<?php

include ("../conexao.php");
include ("../bd/bd_agenda.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $data = $_POST['data'] ?? '';
    $provincia = $_POST['provincia'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $vaga_total = $_POST['vaga_total'] ?? '';

    if (!empty($data) && !empty($provincia) && !empty($valor)) {
        $agenda = new BD_Agenda();

        $resultado = $agenda->updateAgenda(
            $id,
            $provincia,
            $data,
            $valor,
            $vaga_total
        );
        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Edição feita com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao Editar!";

    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos!";

    }
    header("location:../index.php?r=editar-post&id=$id");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $data = $_POST['data'] ?? '';
    $provincia = $_POST['provincia'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $vaga_total = $_POST['vaga_total'] ?? '';

    if (!empty($data) && !empty($provincia) && !empty($valor)) {
        $agenda = new BD_Agenda();
        $resultado = $agenda->insertAgenda(
            $provincia,
            $data,
            $valor,
            $vaga_total
        );

        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Cadastro feito com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao cadastrar!";

    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos!";

    }
    header("location:../index.php?r=agendar-passeio");

} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $dados = new BD_Agenda();

    $id_agenda = $_GET['id'];

    if (isset($_GET['delete'])) {
        $resultado = $dados->deleteAgenda($id_agenda);
        if ($resultado === TRUE)
            $_SESSION['mensagem_sucesso'] = "Deleção feito com sucesso!";
        else
            $_SESSION['mensagem_erro'] = "Falha ao Deletar!";
    }
    header("location:../index.php?r=agendar-passeio");
    exit();
} else {
    header("location:../index.php");
    exit();
}
?>