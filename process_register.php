<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = 'User is required';
    }

    // Validate email
    if (empty($email)) {
        $errors[] = 'Email is mandatory';
    } elseif (!$email) {
        $errors[] = 'Invalid email';
    }

    // Validate password
    if (empty($password)) {
        $errors[] = 'Password is mandatory';
    }

    if (empty($errors)) {
        // Process registration
        // Aqui você adiciona a lógica de registro, como salvar os dados no banco de dados
        // Suponha que o registro seja bem-sucedido:
        echo "Successful registration!";
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
