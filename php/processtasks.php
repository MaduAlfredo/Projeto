<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $taskName = $_POST["taskName"];
    $taskDesc = $_POST["taskDesc"];
    $priority = $_POST["priority"];
    $taskType = $_POST["taskType"];
    $createdBy = $_POST["createdBy"];
    $resp = $_POST["resp"];
    
    include 'conexao.php';
    
    $query = "INSERT INTO tasks(taskName, taskDesc, priority, taskType, createdBy, resp) VALUES('$taskName' ,'$taskDesc', '$priority', '$taskType', '$createdBy', '$resp')";
    
    if(mysqli_query($conexao,$query)){
        echo"Registro inserido com sucesso!";
    } else {
        echo"Erro ao inserir registro: ".mysqli_error($conexao);
    }
    
    mysqli_close($conexao);
}


?>