<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores enviados pelo formulário
    $board_name = $_POST["board_name"];
    $board_desc = $_POST["board_desc"];
    $complexity = $_POST["complexity"];

    include_once 'conexao.php';

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Preparar e executar a inserção no banco de dados
    $sql = "INSERT INTO boards (nome, descricao, expectativa_conclusao, complexidade) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $board_name, $board_desc, $complex);
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
    $conexao->close();
}
?>
