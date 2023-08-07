<?php
// Conexão com o banco de dados
//$servername = "localhost"; // ou endereço IP do servidor
//$username = "admin";
//$password = "18082022";
//$dbname = "taskboltdb";

include_once 'conexao.php';

//$conexao = new mysqli($servername, $username, $password, $dbname);


// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
else{
// Iniciar a sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['email'];
    $senha = $_POST['pass'];

    // Consulta preparada para evitar injeção de SQL
    $stmt = $conexao->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($senha, $user['pass'])) {
            $_SESSION['login'] = $login;
            header('location:kanban.html');
        } else {
            header('location:login.html');
        }
    } else {
        header('location:login.html');
    }

    $stmt->close();
}

$conexao->close();
}
?>
