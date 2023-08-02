// Estabelecer a conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar se a conexão foi bem-sucedida
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Executar a consulta SQL
$query = "SELECT * FROM tabela_exemplo";
$resultado = mysqli_query($conexao, $query);

// Verificar se a consulta foi bem-sucedida
if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

// Apresentar os dados
echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
while ($linha = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $linha['id'] . "</td>";
    echo "<td>" . $linha['nome'] . "</td>";
    echo "<td>" . $linha['email'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>

<?php

$query = "SELECT * FROM users";
$results = mysqli_query($query);

if(!resultado){
    die("Erro na consulta :(")
}

echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
while ($linha = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $linha['id'] . "</td>";
    echo "<td>" . $linha['nome'] . "</td>";
    echo "<td>" . $linha['email'] . "</td>";
    echo "</tr>";
}
echo "</table>"; 

?>