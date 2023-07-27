const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected = dropdown.querySelector('.selected');

  
select.addEventListener('click', () => {
  select.classList.toggle('select-clicked');
  caret.classList.toggle('caret-rotate');
  menu.classList.toggle('menu-open');
});

options.forEach(option => {
  option.addEventListener('click', () => {
      selected.innerText = option.innerText;
      select.classList.remove('select-clicked');
      caret.classList.remove('caret-rotate');
      menu.classList.remove('menu-open');
    
      options.forEach(option => {
        option.classList.remove('active');
        });
          option.classList.add('active');
  });
});


var checkBox = document.getElementById("reg-log");

checkBox.addEventListener('click', function(){
  var view = document.querySelector('.type');
  var elements = document.querySelectorAll('.content');
  if (checkBox.checked){
    elements.forEach(element => {
        element.classList.replace('card', 'lista');
    });
    view.classList.replace('cards', 'listas');
  } else {
    view.classList.replace('listas', 'cards');
    elements.forEach(element => {
        element.classList.replace('lista', 'card');
    });
  }
})
});

function drag(e) {
  e.dataTransfer.setData("text", e.target.id);
}

function allowDrop(e) {
  e.preventDefault();
}

function drop(e) {
  e.preventDefault();
  var data = e.dataTransfer.getData("text");
  e.currentTarget.appendChild(document.getElementById(data));
}

const cards = document.querySelectorAll('.content');
const modal = document.querySelector('.modal');
const close = document.querySelector('.close')

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
})