<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);

    try {
        // Configurações do Servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alekinhosouzasoares@gmail.com';
        $mail->Password = 'uaujttlyoglrukoj'; // Use uma senha de aplicativo do Google.
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Configurações do E-mail
        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress($_POST["email"]);
        $mail->addReplyTo($_POST["email"], $_POST["name"]);

        // Verifica e Anexa o Arquivo
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        }

        // Conteúdo do E-mail
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        // Envia o E-mail
        $mail->send();
        echo "
        <script>
            alert('Message was sent successfully!');
            document.location.href = 'contato.php';
        </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
