const cards = document.querySelectorAll('.content');

const modal = document.querySelector('.modal');
const addModal = document.querySelector('.add-modal');

const close = document.querySelector('.close');
const add = document.querySelector('.add-botao');
const cancel = document.querySelector('.add-cancelar')

cards.forEach((card) => {
  card.addEventListener('click', function(){
    modal.style.display = 'block';
    })
    close.onclick = function() {
        modal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    };
});

add.onclick = function(){
    addModal.style.display = 'block';
}

cancel.onclick = function(){
    addModal.style.display = 'none';
}
