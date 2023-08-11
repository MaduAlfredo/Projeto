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
                <button class="profile-left">        
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
                <img src="../fotos/user_icon.png" width="45px" alt="">
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
                                <select name="complex" class="dropdown-kanban">
                                    <option value="alta">Alta</option>
                                    <option value="media">Média</option>
                                    <option value="baixa">Baixa</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-botoes-kanban">
                            <button class="modal-save">Cancelar</button>
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
            <button href="#" class="add-botao">+ Adicionar</button>
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
                        // Verifique se a chave "task_description" existe antes de acessar
                        if (isset($row_task["task_description"])) {
                            echo '<p>' . $row_task["task_description"] . '</p>';
                        }
                        echo '</div>';
                        echo '</div>';
                        // ... (resto do conteúdo do card)
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
        <div class="add-modal">
            <div class="add-content">
                <form action="../php/processtasks.php" method="POST" class="form-content">
                    <div class="add-inputs">
                        <div class="add-esquerda">
                            <label for="nomeTask">Nome da tarefa:</label>
                            <input type="text" id="nomeTask" name="nomeTask" autofocus>
                            <label for="descricaoTask">Descrição da tarefa:</label>
                            <textarea rows="8" cols="35" id="descricaoTask" name="descricaoTask"></textarea>
                        </div>
                        <div class="add-direita">
                            <label for="diff">Complexidade:</label>
                            <div class="dropdown modal-dropdown" id="diff">
                                <div class="select modal-select">
                                    <span class="selected">Média</span>
                                    <div class="caret"></div>
                                </div>
                                <ul class="menu modal-menu">
                                    <li>Baixa</li>
                                    <li class="active">Média</li>
                                    <li>Alta</li>
                                </ul>
                            </div>
                            <label for="type">Tipo da tarefa:</label>
                            <div class="dropdown modal-dropdown" id="type">
                                <div class="select modal-select">
                                    <span class="selected">Bug</span>
                                    <div class="caret"></div>
                                </div>
                                <ul class="menu modal-menu" id="selecao">
                                    <li>Story</li>
                                    <li>Bug</li>
                                    <li>Task</li>
                                    <li>Spike</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="add-botoes">
                        <button class="add-cancel modal-save">Cancelar</button>
                        <button type="submit" class="add-save" onclick="enviarDados()">Salvar</button>
                    </div>
                </form>
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