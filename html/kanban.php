<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskbolt | Board</title>
    <link rel="stylesheet" href="../css/kanban.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="../css/modal-kanban.css">
    <link rel="stylesheet" href="../css/kanbanphp.css">
</head>

<body>
    <section class="project_sidebar">
        <div class="sidebar-cima">
            <div class="profile">
                <button onclick="document.location='settings.html'" class="profile-left">        
                <?php
                    include_once '../php/conexao.php';

                    if ($conexao->connect_error) {
                        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
                    }

                    include_once '../php/userName.php';

                    echo '<p>'. $userName. '</p>'
                    ?>
                   <span>Abrir configurações</span>
                </button>
            </div>
            <div class="dropdown">
                <div class="select">
                    <span class="selected">Seus Boards</span>
                    <div class="caret"></div>
                </div>
                <ul class="menu">
                    <li id="myButton-kanban">+ Criar Board</li>
                    <?php
                    include_once '../php/conexao.php';

                    if ($conexao->connect_error) {
                        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
                    }

                    include_once '../php/userId.php';

                    // Consulta somente os boards do usuário específico
                    $sql = "SELECT * FROM projects WHERE id_dono = '$userId'";
                    $result = $conexao->query($sql);

                    if (!$result) {
                        die("Erro na consulta SQL: " . $conexao->error);
                    }
                    // Loop através dos resultados do banco de dados e exibir nomes de boards como itens de lista
                    while ($row = $result->fetch_assoc()) {
                        echo '<li><a href="kanban.php?id=' . $row["id_board"] . '">' . $row["board_name"] . '</a></li>';
                    }
                    ?>
                </ul>
                <form method="POST" action="../php/processBoard.php" id="myModal-kanban" class="modal-kanban">
                    <div class="modal-content-kanban">
                        <h1 class="modal-title-kanban">Novo Projeto</h1>
                        <div class="modal-elements-kanban">
                            <h2>Nome do Projeto:</h2>
                            <input type="text" name="board_name-kanban">
                        </div>
                        <div class="modal-elements-kanban">
                            <h2>Descrição do Projeto:</h2>
                            <textarea name="board_desc-kanban" cols="50" rows="5"></textarea>
                        </div>
                        <div class="modal-elements-kanban">
                            <h2>Expectativa de Conclusão:</h2>
                            <input type="date" name="board_expec-kanban" id="modal-date-kanban">
                        </div>
                        <div class="modal-elements-kanban">
                            <h2>Complexidade:</h2>
                            <div id="complex" class="complex">
                                <select name="complex" class="select-kanban">
                                    <option value="alta">Alta</option>
                                    <option value="media">Média</option>
                                    <option value="baixa">Baixa</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-botoes-kanban">
                            <button class="modal-save close-kanban">Cancelar</button>
                            <button class="modal-cancel" type="submit">Criar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar-baixo">
            <a class="logout">Sair</a>
        </div>
    </section>
    <section class="board">
        <div class="exibicao">
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
        </div>
        <div class="add-atv">
            <button class="add-botao">+ Adicionar</button>
        </div>
        <div class="real-kanban cards">
            <div class="type-card status" id="backlog" ondrop="drop(event)" ondragover="allowDrop(event)">
                <span>Backlog</span>
                <?php
                // Conecte-se ao banco de dados
                include_once '../php/conexao.php';

                if ($conexao->connect_error) {
                    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
                }

                // Obtém o ID do board a partir do parâmetro da URL (caso necessário)
                $board_id = isset($_GET['id']) ? $_GET['id'] : null;

                // Consulta as tarefas da tabela "tasks" associadas ao board_id (substitua "id_board" pelo nome correto da coluna)
                $sql_tasks = "SELECT * FROM tasks WHERE id_board = '$board_id'";
                $result_tasks = $conexao->query($sql_tasks);

                if ($result_tasks->num_rows > 0) {
                    // Loop através das tarefas e exibir dentro da div "backlog"
                    while ($row_task = $result_tasks->fetch_assoc()) {
                        echo '<div class="content card" id="task' . $row_task["id_task"] . '" draggable="true" ondragstart="drag(event)">';
                        echo '<div class="cima">';
                        echo '<div class="titulo">';
                        // Verifique se a chave "task_name" existe antes de acessar
                        if (isset($row_task["task_name"])) {
                            echo '<h3>' . $row_task["task_name"] . '</h3>';
                        }
                        echo '</div>';
                        echo '<div class="descricao descricao-card">';
                        // Verifique se a chave "task_desc" existe antes de acessar
                        if (isset($row_task["task_desc"])) {
                            echo '<div class="desc">';
                            echo '<p>' . $row_task["task_desc"] . '</p>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '<div class="prio-type">';
                        echo '<div class="prio-type">';
                        
                        // Verifique o valor da prioridade e exiba uma imagem correspondente
                        if ($row_task["priority"] == "alta") {
                            echo '<img src="../fotos/azul.png" alt="Prioridade Alta" class="ball">';
                        } elseif ($row_task["priority"] == "media") {
                            echo '<img src="../fotos/ciano.png" alt="Prioridade Média" class="ball">';
                        } elseif ($row_task["priority"] == "baixa") {
                            echo '<img src="../fotos/verde.png" alt="Prioridade Baixa" class="ball">';
                        } 
                        
                        echo '</div>';
                        echo '<div class="prio-type">';
                        
                        // Verifique o valor do tipo de tarefa e exiba uma imagem correspondente
                        if ($row_task["task_type"] == "bug") {
                            echo '<img src="../fotos/bug.png" alt="Bug" class="tipo-image">';
                        } elseif ($row_task["task_type"] == "story") {
                            echo '<img src="../fotos/story.png" alt="Story" class="tipo-image">';
                        } elseif ($row_task["task_type"] == "task") {
                            echo '<img src="../fotos/task.png" alt="Task" class="tipo-image">';
                        } elseif ($row_task["task_type"] == "spike") {
                            echo '<img src="../fotos/spike.png" alt="Spike" class="tipo-image">';
                        } 
                        
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Nenhuma tarefa encontrada.</p>';
                }
                ?>
            </div>
            <div class="type-card status" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <span>To do</span>
            </div>
            <div class="type-card status" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                <span>In progress</span>
            </div>
            <div class="type-card status" id="paused" ondrop="drop(event)" ondragover="allowDrop(event)">
                <span>Paused</span>
            </div>
            <div class="type-card status" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                <span>Done</span>
            </div>
        </div>
        
                <!--<div class="add-modal">
            <div class="add-content" style="height: 500px;">
                <form action="../php/processtasks.php" method="POST" class="form-content">
            <div class="add-inputs">
            <div class="add-esquerda">
                <label for="nomeTask">Nome da tarefa:</label>
                <input type="text" id="nomeTask" name="task_title"  autofocus>
                <label for="descricaoTask">Descrição da tarefa:</label>
                <textarea rows="8" cols="35" id="descricaoTask" name="task_desc"></textarea>
            </div>
            <div class="add-direita">
                <label for="type">Data esperada de Conclusão:</label>
                <input type="date" name="task_time" style="height:35px;">
                <label for="diff">Complexidade:</label>
                    <select name="priority" class="select1">
                        <option value="alta" class="choose">Alta</option>
                        <option value="media" class="choose">Média</option>
                        <option value="baixa" class="choose">Baixa</option>
                    </select>
                    <label for="type">Tipo da tarefa:</label>
                    <select name="task_type" class="select1">
                        <option value="story">Story</option>
                        <option value="bug" class="choose">Bug</option>
                        <option value="task" class="choose">Task</option>
                        <option value="spike" class="choose">Spike</option>
                    </select>
                </div>
                
            </div>
            <div class="modal-botoes-kanban">
                <button class="modal-save">Cancelar</button>
                <input class="modal-cancel" type="submit">Criar</input>
            </div>
        </form>
    </div>    
-->
<div class="add-modal">
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
                <input type="date" name="task_time" style="height:35px;">
                <label for="diff">Complexidade:</label>
                <select name="priority" class="select1">
                    <option value="alta" class="choose">Alta</option>
                    <option value="media" class="choose">Média</option>
                    <option value="baixa" class="choose">Baixa</option>
                </select>
                <label for="type">Tipo da tarefa:</label>
                    <select name="task_type" class="select1">
                        <option value="story">Story</option>
                        <option value="bug" class="choose">Bug</option>
                        <option value="task" class="choose">Task</option>
                        <option value="spike" class="choose">Spike</option>
                    </select>
                </div>
                <div class="modal-botoes-kanban">
                <button class="modal-save close-kanban">Cancelar</button>
                <button class="modal-cancel" type="submit">Criar</button>
            </div>
            </div>
        </div>
</div>
        <script src="../js/kanban/dragndrop.js"></script>
        <script src="../js/kanban/visualizacao.js"></script>
        <script src="../js/kanban/modal.js"></script>
        <script src="../js/dropdown.js"></script>
        <script src="../js/kanban/modal-proj.js"></script>
        <script src="../js/kanban/dropdown-kanban.js"></script>
    </section>
</body>

</html>