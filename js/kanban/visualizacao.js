var checkBox = document.getElementById("reg-log");

checkBox.addEventListener('click', function(){
  var view = document.querySelector('.real-kanban');
  var elements = document.querySelectorAll('.content');
  var types = document.querySelectorAll('.status');

  if (checkBox.checked){
    elements.forEach(element => {
        element.classList.replace('card', 'lista');
    });
    types.forEach(type => {
        type.classList.replace('type-card', 'type-lista');
    })
    view.classList.replace('cards', 'listas');
    } else {
      elements.forEach(element => {
        element.classList.replace('lista', 'card');
      });
      types.forEach(type => {
        type.classList.replace('type-lista', 'type-card');
      })
      view.classList.replace('listas', 'cards');
    }
})


const botao = document.querySelector('.profile-left');

botao.onclick = () => {
  location = './settings.html';
}
