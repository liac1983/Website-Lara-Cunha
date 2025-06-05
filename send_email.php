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
            $mail->Body    = nl2br("Name: " . $name . "\nEmail: " . $email . "\nPhone Number: " . $phone . "\nAddress: " . $address . "\n\nMessage:\n" . $message);
            $mail->AltBody = "Name: " . $name . "\nEmail: " . $email . "\nPhone Number: " . $phone . "\nAddress: " . $address . "\n\nMessage:\n" . $message;

            $mail->send();
            echo "<script>alert('Email sent successfully!'); window.location.href = 'index.html';</script>";
        } catch (Exception $e) {
            echo "Error sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Invalid email address.'); window.location.href = 'index.html';</script>";
    }
} else {
    echo "Invalid request method.";
}
?>
