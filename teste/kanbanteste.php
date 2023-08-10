<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .card{
            width: 50%;
            background-color: lavender;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <img src="../fotos/mr.incredible.png" alt="">
<div>
<?php
include_once '../php/conexao.php';

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$sql = "SELECT * FROM projects";
$result = $conexao->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conexao->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>" . $row["board_name"] . "</h2>";
        echo "<p>Id do board: " . $row["id_board"] . "</p>";
        echo "<p>Descrição do board: " . $row["board_desc"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}
?>
</div>
</body>
</html>
