<?php

include_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $taskTitle = $_POST["task_title"];
    $taskDesc = $_POST["task_desc"];
    $opcao = $_POST["taskType"];

    $query = "INSERT INTO tasks(task_name, task_desc, task_type) VALUES('$taskTitle', '$taskDesc', '$opcao')";

    if(mysqli_query($conexao,$query)){
        echo"Registro inserido com sucesso!";
    } else {
        echo"Erro ao inserir registro: ".mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>