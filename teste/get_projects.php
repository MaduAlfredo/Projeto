<?php

include_once '../php/conexao.php';

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

include_once '../php/session.php';
// Consulta ao banco de dados para recuperar os projetos do usuário logado
$sql = "SELECT board_name, board_desc, last_change FROM projects WHERE id_dono = $id_dono";
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

var_dump($projects)
?>