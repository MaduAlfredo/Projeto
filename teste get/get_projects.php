<?php
// Conexão com o banco de dados (assumindo que você já configurou a conexão)
$servername = "http://taskboltdb.co5yba8aprwc.saeast-1.rds.amazonaws.com/";
$username = "admin";
$password = "18082022";
$dbname = "taskboltdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta ao banco de dados para recuperar os projetos
$sql = "SELECT project_name, project_description, last_update FROM projects";
$result = $conn->query($sql);

$projects = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = array(
            "project_name" => $row["project_name"],
            "project_description" => $row["project_description"],
            "last_update" => $row["last_update"]
        );
    }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retornar os projetos em formato JSON
header('Content-Type: application/json');
echo json_encode($projects);
?>
