<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome=$_POST["nome"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];

    include 'conexao.php';

    $query="INSERT INTO users(nome, phone, email, pass ) VALUES('$nome', '$phone', '$email', '$pass')";

    if(mysqli_query($conexao,$query)){
        echo"Registro inserido com sucesso!";
    } else {
        echo"Erro ao inserir registro: ".mysqli_error($conexao);
    }

    mysqli_close($conexao);
}


?>

<?php

if($_SERVER["RESQUEST_METHOD"] == "POST"){

    $projectname = $_POST["projectname"];
    $rojectdesc = $_POST["projectname"];
    $projectconclusion = $_POST["projectname"];
    $projectcomplex = $_POST["projectname"];

    include 'conexao.php'

    $query = "INSERT INTO projects(board_name, board_desc, complex)"

}