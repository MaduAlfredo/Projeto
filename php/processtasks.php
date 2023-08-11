<?php
include_once '../php/conexao.php';
// Inicia a sessão no início do script
session_start();

$_SESSION["id_user"] = $id_user;
$_SESSION["id_board"] = $id_board;

$id_dono=$id_user;

$teste = "SELECT * FROM projects WHERE id_dono = '$id_dono'";


$result = mysqli_query($conexao, $teste);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id_board = $row["id_board"];
            $boardName = $row["board_name"];
            $boardDesc = $row["board_desc"];
            $boardTime = $row["dates"];
            echo "Nome do Board: " . $boardName . "<br>";
            echo "Descrição do Board: " . $boardDesc . "<br>";
            echo "Data do Board: " . $boardTime . "<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Nenhum resultado encontrado.";
    }
} else {
    echo "Erro na consulta: " . mysqli_error($conexao);
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
