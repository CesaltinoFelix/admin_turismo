<?php
// Inclua o arquivo de conexão com o banco de dados e outras configurações necessárias

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include("../conexao.php");
    $conn = estabelecerConexao();
    // Verifique se os dados foram enviados via formulário
    if (isset($_POST['email'], $_POST['token'], $_POST['senha'])) {
        $email = $_POST['email'];
        $token = $_POST['token'];
        $novaSenha = $_POST['senha'];

        // Verifique se o token é válido para o email fornecido
        $query = "SELECT * FROM tb_usuario WHERE email = '$email' AND token_recuperacao = '$token'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Token válido, atualize a senha
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $query_update_senha = "UPDATE tb_usuario SET senha = '$senhaHash', token_recuperacao = NULL WHERE email = '$email'";
            $result_update_senha = mysqli_query($conn, $query_update_senha);

            if ($result_update_senha) {
                $_SESSION['mensagem_sucesso'] = "Senha resetada com sucesso.";
                header("Location: login.php");
                exit();
            } else {
                 $_SESSION['mensagem_erro'] = "Erro ao resetar a senha.";
            }
        } else {
             $_SESSION['mensagem_erro'] = "Token de recuperação inválido ou expirado.";
        }
    } else {
         $_SESSION['mensagem_erro'] = "Dados incompletos.";
    }
} else {
    // Redirecione para a página de recuperação de senha se os dados não foram enviados via formulário
    header("Location: recuperar_senha.php");
    exit();
}
?>
