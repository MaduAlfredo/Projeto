<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/kanban.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="../css/modal-kanban.css">
</head>
<body>
<form action="../teste/process.php" method="POST" >
    <div class="modal-content-kanban">
        <h1 class="modal-title-kanban">Novo Projeto</h1>
        <div class="modal-elements-kanban">
            <h2>Nome do Projeto</h2>
            <input type="text" name="boardName" placeholder="Título do Board">
        </div>
        <div class="modal-elements-kanban">
            <h2>Descrição do Projeto:</h2>
            <textarea name="boardDesc" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="modal-elements-kanban">
            <h2>Expectativa de Conclusão:</h2>
            <input type="date" name="boardTime" id="">
        </div>
        <!-- <div class="dropdown-kanban">
        </div> -->

            <div id="complex" class="complex" class="dropdown-kanban">
                <select name="complex" class="menu-kanban menu-open-kanban">
                    <option value="alta">Alta</option>
                    <option value="media">Média</option>
                    <option value="baixa">Baixa</option>
                </select>
            </div>
        <button class="modal-save">Cancelar</button>
        <input class="modal-cancel" type="submit" value="Criar">
    </div>
</form>

</body>
</html>