<?php
// Inicia a sessão para ter acesso às informações do usuário logado
session_start();

// Verifique se o email do usuário está presente na sessão
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    include_once '../php/conexao.php';

    //if (!$conexao) {
    //    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
    //}

    // Consulta SQL para obter o ID do usuário com base no email
    $query = "SELECT id_user FROM users WHERE email = '$email'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        // Verifica se um registro foi encontrado
        if (mysqli_num_rows($result) > 0) {
            // Obtém o ID do usuário a partir do resultado da consulta
            $row = mysqli_fetch_assoc($result);
            $id_user = $row['id_user'];

            // Use o $user_id conforme necessário
            echo "O ID do usuário é: " . $id_user;
        } else {
            echo "Nenhum usuário encontrado com esse email.";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conexao);
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    echo "Email do usuário não encontrado na sessão.";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../php/processtasks.php" method="POST">
        <input type="text" name="task_title" placeholder="título da task">
        <textarea name="task_desc" id="task_desc" cols="30" rows="10">Descreva a tarefa</textarea>
        <div class="opcoes">
            <select name="taskD" id="TaskD">
                <option value="Alta">Alta</option>
                <option value="Média">Média</option>
                <option value="Baixa">Baixa</option>
              </select>
        </div>
        <div class="opcoes">
            <select name="taskType" id="taskType">
                <option value="task">Task</option>
                <option value="bug">Bug</option>
                <option value="spike">Spike</option>
                <option value="story">Story</option>
              </select>
        </div>
        <button type="submit">enviar</button>
    </form>
</body>
</html>