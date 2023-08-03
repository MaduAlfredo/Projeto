  // Obtém os elementos do DOM
  var modalkanban = document.getElementById("myModal-kanban");
  var buttonkanban = document.getElementById("myButton-kanban");
  var spankanban = document.getElementsByClassName("close-kanban")[0];
  
  // Ação ao clicar no botão para abrir o modal
  buttonkanban.onclick = function() {
    modalkanban.style.display = "block";
  };
  
  // Ação ao clicar no "x" para fechar o modal
  spankanban.onclick = function() {
    modalkanban.style.display = "none";
  };
  
  // Ação ao clicar fora do modal para fechá-lo
  window.onclick = function(event) {
    if (event.target == modalkanban) {
      modalkanban.style.display = "none";
    }
  };