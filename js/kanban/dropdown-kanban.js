document.addEventListener('DOMContentLoaded', function() {
  // Seu código JavaScript aqui
  
  
function toggleDropdown(dropdown) {
  const selectkanban = dropdown.querySelector('.select-kanban');
  const caretkanban = dropdown.querySelector('.caret-kanban');
  const menukanban = dropdown.querySelector('.menu-kanban');
  
  selectkanban.classList.toggle('select-clicked-kanban');
  caretkanban.classList.toggle('caret-rotate-kanban');
  menukanban.classList.toggle('menu-open-kanban');
}

function handleOptionClick(selectedkanban, optionskanban, option) {
  selectedkanban.innerText = option.innerText;
  selectedkanban.classList.remove('select-clicked-kanban');
  selectedkanban.classList.remove('caret-rotate-kanban');
  
  optionskanban.forEach(option => {
    option.classList.remove('active-kanban');
  });
  
  option.classList.add('active-kanban');
}

const dropdowns = document.querySelectorAll('.dropdown-kanban');

dropdowns.forEach(dropdown => {
  const selectedkanban = dropdown.querySelector('.selected-kanban');
  const optionskanban = dropdown.querySelectorAll('.menu-kanban li');
  
  const selectkanban = dropdown.querySelector('.select-kanban');
  selectkanban.addEventListener('click', () => {
    toggleDropdown(dropdown);
  });
  
  optionskanban.forEach(option => {
    option.addEventListener('click', () => {
      handleOptionClick(selectedkanban, optionskanban, option);
    });
  });
});

});