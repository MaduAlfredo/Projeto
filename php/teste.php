<?php
// Inicia a sessão para ter acesso às informações do usuário logado
session_start();

// Verifica se o usuário está logado (se o nome de usuário está armazenado na sessão)
if (!isset($_SESSION["email"])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: index.php");
    exit();

    function getUserNameByEmail($email){
        global $conexao;
        //$email = $conexao->real_escape_string($email);

        $sql = "SELECT nome FROM users WHERE email='$email'";

        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["nome"];
        } else {
            return null; // Retorna null caso o email não esteja na base de dados
        }
    }

        $emailFornecido = "mariaedualfredo@gmail.com";
        $nomeUser = getUserNameByEmail($emailFornecido);

        if($nomeUser){
            
            echo "Bem vinda" . $nomeUser . "!";
        }else{
            echo"deu ruim :(";
        }
} ?>