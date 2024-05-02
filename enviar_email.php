<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    // Configurações do servidor SMTP do Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cesaltinofelix01@gmail.com'; // Seu email do Gmail
    $mail->Password = 'ifiy lxek jtdq fbar'; // Sua senha do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS
    $mail->Port = 587; // Porta TLS

    // Configurações do email a ser enviado
    $mail->setFrom('cesaltinofelix01@gmail.com', 'Kuzola Nzambi');
    $mail->addAddress($email); // Email do destinatário
    $mail->Subject = $assunto;
    $mail->Body = $mensagem; // Corpo do email

    // Enviar email
    $mail->send();
    $_SESSION['mensagem_sucesso'] = "Email enviado com sucesso!";
} catch (Exception $e) {
    $_SESSION['mensagem_erro'] = "Erro ao enviar o email: {$mail->ErrorInfo}";
}
?>