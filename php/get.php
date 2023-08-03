<?php
// Inclua o arquivo de conexão que criamos anteriormente
include('conexao.php');

// Consulta para buscar os dados do banco de dados (Exemplo com uma tabela "usuarios")
$sql = "SELECT * FROM users";
$resultado = $conexao->query($sql); // Corrigindo a execução da consulta usando $conn

// Fechar conexão com o banco de dados
$conexao->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dados do Banco de Dados</title>
</head>
<body>
    <h1>Dados do Banco de Dados</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php
        // Exibir os dados na tabela
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum dado encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
