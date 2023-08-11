document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.content');
  
    const modal = document.querySelector('.modal');
    const addModal = document.querySelector('.add-modal');
  
    const close = document.querySelector('.close');
    const add = document.querySelector('.add-botao');
    const cancel = document.querySelector('.add-cancel');
  
    cards.forEach((card) => {
      card.addEventListener('click', function(){
        modal.style.display = 'block';
      });
    });
  
    if (close) {
      close.onclick = function() {
        modal.style.display = "none";
      };
    }
  
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  
    if (add) {
      add.onclick = function(){
        addModal.style.display = 'block';
      };
    }
  
    if (cancel) {
      cancel.onclick = function(){
        addModal.style.display = 'none';
      };
    }
  });
  