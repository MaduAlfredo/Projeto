<?php
include_once 'conexao.php';
include_once 'session.php';
include_once 'userId.php';

$_SESSION["id_user"];

$sqlselect = "SELECT * FROM users WHERE id_user = '$userId'";

$result = conexao->query($sqlselect);

if($result -> num_rows > 0){
    $sqlDelete = "DELETE FROM users WHERE id_user = '$userId'";
    $resultDelete = conexao -> query($sqlDelete);
}

header("Location: ../html/settings.html");
?>