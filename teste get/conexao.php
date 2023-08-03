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

?>