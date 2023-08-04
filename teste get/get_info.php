<?php
// Configurações do banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'taskboltdb';

// Conexão com o banco de dados
$conn = mysqli_connect($host, $usuario, $senha, $banco);

// Verificação de erros na conexão
if (mysqli_connect_errno()) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
}
else{

// Query para obter as informações do banco de dados
try {
    $stmt = $conn->query("SELECT * FROM projects");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro na consulta ao banco de dados: " . $e->getMessage();
}

// Retornar os dados em formato JSON (você pode personalizar o formato de acordo com suas necessidades)
header('Content-Type: application/json');
echo json_encode($result);
}
?>