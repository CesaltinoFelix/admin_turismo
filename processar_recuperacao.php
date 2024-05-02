<?php
// Inclua o arquivo de conexão com o banco de dados e outras configurações necessárias
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include ("../conexao.php");
    $conn = estabelecerConexao();
    // Verifique se o email foi enviado via formulário
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Verifique se o email existe no banco de dados
        $query = "SELECT * FROM tb_usuario WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Gere um token único para a recuperação de senha
            $token = bin2hex(random_bytes(16)); // Token de 32 caracteres (hexadecimal)

            // Atualize o token no banco de dados para o usuário
            $query_update_token = "UPDATE tb_usuario SET token_recuperacao = '$token' WHERE email = '$email'";
            $result_update = mysqli_query($conn, $query_update_token);

            if ($result_update) {
                // Envie um email com o link de recuperação contendo o token
                $assunto = "Recuperacao de Senha";
                $mensagem = "Olá,\n\nPara recuperar sua senha, clique no link a seguir:\n\n";
                $mensagem .= "http://localhost/turismo/admin/resetar_senha.php?" . "email=$email&token=$token\n\n";
                $mensagem .= "Se não solicitou a recuperação de senha, ignore este email.\n\nAtenciosamente, Equipe do Site";
                include_once ("./enviar_email.php");
                // Use a função mail() do PHP para enviar o email (configurações do servidor de email devem estar corretas)
                // mail($email, $assunto, $mensagem);

                // Exemplo de saída para fins de demonstração
            } else {
                $_SESSION['mensagem_erro'] = "Erro ao atualizar o token de recuperação no banco de dados.";
            }
        } else {
            $_SESSION['mensagem_erro'] = "O email fornecido não está registrado em nossa base de dados.";
        }
    } else {
        $_SESSION['mensagem_erro'] = "Email não foi enviado.";
    }
    header("Location: recuperar_senha.php");
} else {
    // Redirecione para a página de recuperação de senha se o formulário não foi enviado
    header("Location: recuperar_senha.php");
    exit();
}
?>