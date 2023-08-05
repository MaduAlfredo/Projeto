<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores enviados pelo formulário
    $board_name = $_POST["board_name"];
    $board_desc = $_POST["board_desc"];
    $board_expec = $_POST["board_expec"];
    $complexity = $_POST["complexity"];

    // Conexão com o banco de dados (substitua pelos seus dados de conexão)
    $servername = "http://taskboltdb.co5yba8aprwc.saeast-1.rds.amazonaws.com/";
    $username = "admin";
    $password = "18082022";
    $dbname = "taskboltdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Preparar e executar a inserção no banco de dados
    $sql = "INSERT INTO boards (nome, descricao, expectativa_conclusao, complexidade) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $board_name, $board_desc, $board_expec, $complexity);
    $stmt->execute();

    // Verificar se a inserção foi bem-sucedida e redirecionar para a página inicial
    if ($stmt->affected_rows > 0) {
        // Inserção bem-sucedida
        header("Location: index.html");
        exit();
    } else {
        // Inserção falhou
        echo "Erro ao salvar os dados no banco de dados.";
    }

    // Fechar a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
