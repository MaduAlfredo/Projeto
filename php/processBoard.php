<?php
include_once '../php/conexao.php';

session_start();

if (!isset($_SESSION["email"])) {
    exit();
}

// Assuming $conexao is the database connection

$email = $_SESSION["email"]; // Make sure to sanitize and validate the email

$query = "SELECT id_user FROM users WHERE email = '$email'";
$stmt = mysqli_prepare($conexao, $query);

if ($stmt) {
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_bind_result($stmt, $userId);

    if (mysqli_stmt_fetch($stmt)) {
        // $userId now holds the fetched value
        // Use $userId as needed
    } else {
        // Handle fetch error
    }

    mysqli_stmt_close($stmt);
} else {
    // Handle statement preparation error
    echo "Statement Error: " . mysqli_error($conexao);
}
$complex = isset($_POST["complex"]) ? $_POST["complex"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user inputs
    $boardName = $_POST["board_name-kanban"];
    $boardDesc = $_POST["board_desc-kanban"];
    $boardTime = $_POST["board_expec-kanban"];

    // Assuming $conexao is the database connection
    $insertQuery = "INSERT INTO projects (id_dono, board_name, board_desc, dates, complex) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $userId, $boardName, $boardDesc, $boardTime, $complex);
        if (mysqli_stmt_execute($stmt)) {
            //echo "Registro inserido com sucesso!";
            header("Location: ../teste/kanban.php");
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
