<?php

include_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar se as credenciais estão corretas
    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id_user = $row["id_user"]; // Obtém o id_user associado ao email

        session_start();
        // Armazena o email e o id_user na sessão
        $_SESSION["email"] = $email;
        $_SESSION["id_user"] = $id_user; // Correção: use a variável $id_user
        

        header("Location: ../html/kanban.php");
    } else {
        // Caso contrário, mostre uma mensagem de erro
        echo "Usuário ou senha inválidos.";
    }
}

$conexao->close();

?>