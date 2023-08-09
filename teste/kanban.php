<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/kanban.css">
    <link rel="stylesheet" href="../css/modal.css">
    <title>Home</title>
</head>
<body>
    <section class="project">
        <header class="project_header">
            <div class="dropdown">
            <img src="../fotos/mr.incredible.png" class="dropbtn">
                <div class="dropdown-content">
                    <a href="settings.html"><a href="settings.html">Configurações</a></a>
                    <a href="splash.html"><img src="../fotos/logout.png" class="logout-home"></a>
                </div><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskbolt | Board</title>
    <link rel="stylesheet" href="../css/kanban.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="../css/modal-kanban.css">
</head>
<body>
    <section class="project_sidebar">
        <div class="sidebar-cima">
            <div class="profile">
                <button class="profile-left">
                    <p>valorant da silva</p>
                    <span>Abrir configurações</span>
                </button>
                <img src="../fotos/user_icon.png" width="45px" alt="">
            </div>
            <div class="dropdown">
                <div class="select">
                  <span class="selected">Projeto 1</span>
                  <div class="caret"></div>
                </div>
                <ul class="menu">
                  <li id="myButton-kanban">+ Criar projeto</li>
                  <li class="active">Projeto 1</li>
                </ul>
                <div id="myModal-kanban" class="modal-kanban">
                    <div class="modal-content-kanban">
                        <span class="close-kanban">&times;</span>
                        <div>
                            <h2 class="modal-title-kanban">Novo Board</h2>
                        <div class="modal-elements-kanban">
                            <h1 class="modal-names-kanban">Nome do Board</h1>
                            <input type="text-kanban" name="board_name-kanban" class="modal-input-name-kanban">
                        </div>
                        <hr>
                        <div class="modal-elements-kanban">
                            <h1 class="modal-names-kanban">Descrição do Board</h1>
                            <textarea name="board_desc-kanban" cols="50" rows="5" class="modal-input-desc-kanban"></textarea>
                        </div>
                        <hr>
                        <div class="modal-elements-kanban">
                            <h1 class="modal-names-kanban">Expectativa de Conclusão</h1>
                            <input type="date" name="board_expec-kanban" class="modal-input-expec-kanban">
                        </div>
                        <hr>
                        <div class="modal-elements-kanban">
                            <h1 class="modal-names-kanban">Complexidade</h1>
                        <div class="dropdown-kanban">
                            <div class="select-kanban" >
                                <span class="selected-kanban">Média</span>
                                <div class="caret-kanban"></div>
                            </div>
                            <ul class="menu-kanban">
                                <li>Alta</li>
                                <li class="active-kanban">Média</li>
                                <li>Baixa</li>
                            </ul>
                          </div>
                          </div>
                          <button id="criarDiv-kanban" onclick="criarDiv()" class="modal-elements-kanban">Criar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-baixo">
            <button class="logout">
              <div class="logoutPic">
                  <img src="../fotos/logout.png" alt="" >
              </div>
              <div class="logoutText">
                <span>Sair</span>
              </div>
          </button>
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
                <div class="content card" id="task1" draggable="true" ondragstart="drag(event)">
                    <div class="cima">
                        <div class="titulo">
                            <h3>inserindo bastante texto pra testar o card</h3>
                        </div>
                        <div class="descricao descricao-card">
                            <p>uau aqui estou super descrevendo o card hahahaha</p>
                        </div>
                    </div>
                    <div class="dificuldade"></div>
                </div>
            </div>
            <div class="type-card status" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <span>To do</span>
                <div class="content card" id="task2" draggable="true" ondragstart="drag(event)">
                    <div class="cima">
                        <div class="titulo">
                            <h3>esse é o título do card, hahahaha</h3>
                        </div>
                        <div class="descricao descricao-card">
                            <p>descricao numero 2 eitarrrr vou me matar aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                        </div>
                    </div>
                    <div class="baixo">
                        <div class="dificuldade"></div>
                    </div>
                </div>
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
        <div class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>esse é o título do modal que eu abri hein hehe</h1>
                <p>descrição muito foda</p>
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
                        <button class="add-cancel">Cancelar</button>
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
            </div>
            <h1 class="project_title">Seja Bem Vindo!</h1>
        </header>
        <div class="paola">
            <img src="../fotos/new icon.png" class="new_icon"  id="myButton">

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <!-- <span class="close">&times;</span>
                    <div>
                        <h2 class="modal-title">Novo Board</h2>
                    <div class="modal-elements">
                        <h1 class="modal-names">Nome do Board</h1>
                        <input type="text" name="board_name" class="modal-input-name">
                    </div>
                    <hr>
                    <div class="modal-elements">
                        <h1 class="modal-names">Descrição do Board</h1>
                        <textarea name="board_desc" cols="50" rows="5" class="modal-input-desc"></textarea>
                    </div>
                    <hr>
                    <div class="modal-elements">
                        <h1 class="modal-names">Expectativa de Conclusão</h1>
                        <input type="date" name="board_expec" class="modal-input-expec">
                    </div>
                    <hr>
                    <div class="modal-elements">
                        <h1 class="modal-names">Complexidade</h1>
                    <div class="dropdown-home">
                        <div class="select-home" >
                            <span class="selected-home">Média</span>
                            <div class="caret-home"></div>
                        </div>
                        <ul class="menu-home">
                            <li>Alta</li>
                            <li class="active-home">Média</li>
                            <li>Baixa</li>
                        </ul>
                      </div>
                      </div> -->
                      <button id="criarDiv" onclick="criarDiv()" class="modal-elements">Criar</button>
                    </div>
                </div>

                <div></div>
            </div>
              <h1 class="title2-home">Seus Boards</h1>
        </div>
        
    </section>
<script src="../js/project_funcions.js"></script>
<script src="../js/modal.js"></script>
<script src="../js/dropdownhome.js"></script>
</body>
</html>