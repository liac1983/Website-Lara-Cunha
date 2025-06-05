<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = 'User is required';
    }

    // Validate password
    if (empty($password)) {
        $errors[] = 'Password is mandatory';
    }

    if (empty($errors)) {
        // Process login
        // Aqui você adiciona a lógica de autenticação, como verificar as credenciais no banco de dados
        // Suponha que o login seja bem-sucedido:
        echo "Successful login!";
        header("Location: index.html");
        exit();
    } else {
        // Return errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
} else {
    echo "Invalid request method.";
}
?>
