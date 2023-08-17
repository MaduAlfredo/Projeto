<?php
// Configurações do banco de dados
$host = 'taskboltdb.cfd4uoticztw.sa-east-1.rds.amazonaws.com';
$usuario = 'admin';
$senha = '18082022';
$banco = 'taskboltdb';

// Conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificação de erros na conexão
if (mysqli_connect_errno()) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
}
?>