<?php
include_once 'conexao.php';

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$sql = "SELECT id_dono, board_name, board_desc FROM projects";
$result = $conexao->query($sql);

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