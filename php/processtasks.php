<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $taskName = $_POST["nomeTask"];
    $taskDesc = $_POST["descricaoTask"];
    //$priority = $_POST["priority"];
    //$taskType = $_POST["taskType"];
    //$createdBy = $_POST["createdBy"];
    //$resp = $_POST["resp"];
    
    $dados = $_POST["dados"];
    $dadosString = implode(", ", $dados);



    include 'conexao.php';
    //$sql = "INSERT INTO tasks (task_type) VALUES('$dadosString')";

    //if ($conexao->query($sql) === TRUE) {
     //   echo "Dados inseridos com sucesso no banco de dados.";
   //} else {
    //    echo "Erro ao inserir os dados: " .mysqli_error($conexao);
    //}

    
    $query = "INSERT INTO tasks(taskName, task_type, taskDesc) VALUES('$taskName','$dadosString', '$taskDesc')";
    
    if(mysqli_query($conexao,$query)){
        echo"Registro inserido com sucesso!";
    } else {
        echo"Erro ao inserir registro: ".mysqli_error($conexao);
    }
    
    mysqli_close($conexao);
}


?>

