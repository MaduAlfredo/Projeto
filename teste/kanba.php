<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/kanban.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="../css/modal-kanban.css">
    <link rel="stylesheet" href="../css/kanbanphp.css">
</head>
<body>
<div class="add-content" style="height: 500px;">
    <form action="../php/processtasks.php" method="POST">
        <div class="add-inputs">
            <div class="add-esquerda">
                <label for="nomeTask">Nome da tarefa:</label>
                <input type="text" id="nomeTask" name="task_title"  autofocus>
                <label for="descricaoTask">Descrição da tarefa:</label>
                <textarea rows="8" cols="35" id="descricaoTask" name="task_desc"></textarea>
            </div>
            <div class="add-direita">
                <label for="type">Data esperada de Conclusão:</label>
                    <input type="date" name="task_time" id="">
                <label for="diff">Complexidade:</label>
                    <select name="priority" id="">
                        <option value="alta">Alta</option>
                        <option value="media">Média</option>
                        <option value="baixa">Baixa</option>
                    </select>
                <label for="type">Tipo da tarefa:</label>
                    <select name="task_type" id="">
                        <option value="story">Story</option>
                        <option value="bug">Bug</option>
                        <option value="task">Task</option>
                        <option value="spike">Spike</option>
                    </select>
            </div>

        </div>
        <div class="modal-botoes-kanban">
        <button class="modal-save">Cancelar</button>
        <button class="modal-cancel" type="submit">Criar</button>
        </div>
    </form>
</div>    
</body>
</html>