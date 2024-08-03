<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = 'Usuário é obrigatório';
    }

    // Validate email
    if (empty($email)) {
        $errors[] = 'Email é obrigatório';
    } elseif (!$email) {
        $errors[] = 'Email inválido';
    }

    // Validate password
    if (empty($password)) {
        $errors[] = 'Senha é obrigatória';
    }

    if (empty($errors)) {
        // Process registration
        // Aqui você adiciona a lógica de registro, como salvar os dados no banco de dados
        // Suponha que o registro seja bem-sucedido:
        echo "Registro bem-sucedido!";
        header("Location: index.html");
        exit();
    } else {
        // Return errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
} else {
    echo "Método de requisição inválido.";
}
?>
