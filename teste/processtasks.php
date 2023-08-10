<?php
include_once '../php/conexao.php';
// Inicia a sessão no início do script
session_start();

$id_board = null; // Inicialize a variável id_board

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    if($email=="maria@gmail.com"){
        $id_board=2;
    }
    elseif($email == "duda@gmail.com"){
        $id_board=3;
    }
    elseif($email == "teste@gmail.com"){
        $id_board=1;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user inputs
    $taskTitle = $_POST["task_title"];
    $taskDesc = $_POST["task_desc"];
    $taskTime = $_POST["task_time"];
    $priority = isset($_POST["priority"]) ? $_POST["priority"] : "";
    $task_type = isset($_POST["task_type"]) ? $_POST["task_type"] : "";
    // $id_board = 2;

    // Assuming $conexao is the database connection
    $insertQuery = "INSERT INTO tasks (id_board, task_name, task_desc, dates, priority, task_type) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isssss", $id_board, $taskTitle, $taskDesc, $taskTime, $priority, $task_type);
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro inserido com sucesso!";
            //header("Location: ../teste/kanbanteste.php");
        } else {
            echo "Erro ao inserir registro: " . mysqli_error($conexao);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da declaração: " . mysqli_error($conexao);
    }
} else {
    echo "Método de requisição inválido.";
}

// Close the database connection
mysqli_close($conexao);

?>
