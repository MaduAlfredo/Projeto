<?php
session_start();

    if (!isset($_SESSION["email"])) {
        header("Location: index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/modal.css">
    <title>Taskbolt | Home</title>
</head>
<body>
    <section class="project">
        <header class="project_header">
            <div class="dropdown">
            <img src="../fotos/mr.incredible.png" class="dropbtn">
                <div class="dropdown-content">
                    <a href="settings.html">Configurações</a>
                    <a href="splash.html"><img src="../fotos/logout.png" class="logout-home"></a>
                </div>
            </div>
            <h1 class="project_title">Seja Bem Vindo(a) <?php  echo $_SESSION["email"]; ?></h1>
        </header>
        <div class="paola">
            <img src="../fotos/new icon.png" class="new_icon"  id="myButton">

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
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
                      </div>
                      <button id="criarDiv" onclick="criarDiv()" class="modal-elements">Criar</button>
                    </div>
                </div>
            </div>
              <h1 class="title2-home">Seus Boards</h1>
        </div>
        <div id="containerDiv" class="project_grid">      
            <div class="project_items">
                <a href="kanban.html"><p class="judas">Nome do Projeto: {project_name}</p></a>
                <a href="kanban.html"><p class="patricia">Descrição do projeto: {project_description}</p></a>
                <p class="pedrinho">Ultima alteração: 01/01/01</p>
            </div>   
        </div>
    </section>
<script src="../js/project_funcions.js"></script>
<script src="../js/modal.js"></script>
<script src="../js/dropdownhome.js"></script>
</body>
</html>