<?php
include_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskTitle = $_POST["task_title"];
    $taskDesc = $_POST["task_desc"];
    $opcao = $_POST["taskType"];

    // Perform a check to ensure the value of $opcao exists in the referenced table (e.g., task_types)
    $opcaoExistsQuery = "SELECT COUNT(*) as count FROM tasks WHERE task_type = '$opcao'";
    $opcaoExistsResult = mysqli_query($conexao, $opcaoExistsQuery);
    $opcaoExistsRow = mysqli_fetch_assoc($opcaoExistsResult);
    $opcaoCount = $opcaoExistsRow['count'];

    if ($opcaoCount > 0) {
        // If the value of $opcao exists in the referenced table, proceed with the insert query
        $query = "INSERT INTO tasks(task_name, task_desc, task_type) VALUES('$taskTitle', '$taskDesc', '$opcao')";

        if (mysqli_query($conexao, $query)) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . mysqli_error($conexao);
        }
    } else {
        echo "O valor selecionado para taskType não existe na tabela task_types.";
    }

    mysqli_close($conexao);
}
?>
