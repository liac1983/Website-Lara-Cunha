<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if ($email) {
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Defina o servidor SMTP do seu provedor de email
            $mail->SMTPAuth = true;
            $mail->Username = 'lara2003cunha@gmail.com'; // Seu endereço de email
            $mail->Password = 'liac1983'; // Sua senha de email (certifique-se de utilizar uma senha de app se necessário)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipientes
            $mail->setFrom('lara2003cunha@gmail.com', 'Lara Cunha');
            $mail->addAddress('lara2003cunha@gmail.com');

            // Conteúdo
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br("Nome: " . $name . "\nEmail: " . $email . "\nTelefone: " . $phone . "\nEndereço: " . $address . "\n\nMensagem:\n" . $message);
            $mail->AltBody = "Nome: " . $name . "\nEmail: " . $email . "\nTelefone: " . $phone . "\nEndereço: " . $address . "\n\nMensagem:\n" . $message;

            $mail->send();
            echo "<script>alert('Email enviado com sucesso!'); window.location.href = 'index.html';</script>";
        } catch (Exception $e) {
            echo "Erro ao enviar o email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Endereço de email inválido.'); window.location.href = 'index.html';</script>";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
