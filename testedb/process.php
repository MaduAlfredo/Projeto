<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome=$_POST["nome"];
    $age=$_POST["age"];
    $color=$_POST["color"];

    include 'conexao.php';

    $query="INSERT INTO information(nome, age, color) VALUES('$nome', '$age', '$color')";

    if(mysqli_query($conexao,$query)){
        echo"Registro inserido com sucesso!";
    } else {
        echo"Erro ao inserir registro: ".mysqli_error($conexao);
    }

    mysqli_close($conexao);
}


?>
