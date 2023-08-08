<?php

include_once 'conexao.php';

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Consulta ao banco de dados para recuperar os projetos
$sql = "SELECT board_name, board_desc, last_change FROM projects";
$result = $conexao->query($sql);

$projects = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = array(
            "board_name" => $row["board_name"],
            "board_desc" => $row["board_desc"],
            "last_change" => $row["last_change"]
        );
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();

// Retornar os projetos em formato JSON
header('Content-Type: application/json');
echo json_encode($projects);
?>
