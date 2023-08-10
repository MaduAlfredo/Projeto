<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            background-color: black;
            color: white;
        }
    </style>
    <title>Home</title>
</head>
<body>
<img src="../fotos/mr.incredible.png">
<div>
<?php
include_once 'conexao.php';

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$sql = "SELECT id_dono, board_name, board_desc FROM projects";
$result = $conexao->query($sql);

var_dump($id_dono);
var_dump($board_name);
var_dump($board_desc);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>" . $row["board_name"] . "</h2>";
        echo "<p>Descrição do board: $" . $row["board_desc"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}
?>
</div>
</body>
</html>
