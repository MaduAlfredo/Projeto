  // Obtém os elementos do DOM
  var modal = document.getElementById("myModal");
  var button = document.getElementById("myButton");
  var span = document.getElementsByClassName("close")[0];
  
  // Ação ao clicar no botão para abrir o modal
  button.onclick = function() {
    modal.style.display = "block";
  };
  
  // Ação ao clicar no "x" para fechar o modal
  span.onclick = function() {
    modal.style.display = "none";
  };
  
  // Ação ao clicar fora do modal para fechá-lo
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };