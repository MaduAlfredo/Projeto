<?php

include_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["res"])) {
        // Recebe os dados enviados pelo frontend
        $dadosString = $_POST["res"];
        // Converte a string em um array
        $dados = explode(", ", $dadosString);
        // Agora você pode usar o array $dados conforme necessário em sua consulta SQL

        $taskName = $_POST["nomeTask"];
        $taskDesc = $_POST["descricaoTask"];

        $dadosString = implode(", ", $dados);
        

        $query = "INSERT INTO tasks(task_name, task_desc, task_type) VALUES('$taskName', '$taskDesc', '$dadosString')";
    
        if(mysqli_query($conexao,$query)){
            echo"Registro inserido com sucesso!";
        } else {
            echo"Erro ao inserir registro: ".mysqli_error($conexao);
        }
        mysqli_close($conexao);
    }

    var_dump($_POST);
}else{
    echo 'burro';
}


?>