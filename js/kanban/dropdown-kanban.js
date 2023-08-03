const dropdownskanban = document.querySelectorAll('.dropdown-kanban');

dropdowns.forEach(dropdown => {
    const selectkanban = dropdown.querySelector('.select-kanban');
    const caretkanban = dropdown.querySelector('.caret-kanban');
    const menukanban = dropdown.querySelector('.menu-kanban');
    const optionskanban = dropdown.querySelectorAll('.menu-kanban li');
    const selectedkanban = dropdown.querySelector('.selected-kanban');

  
selectkanban.addEventListener('click', () => {
  selectkanban.classList.toggle('select-clicked-kanban');
  caretkanban.classList.toggle('caret-rotate-kanban');
  menukanban.classList.toggle('menu-open-kanban');
});

optionskanban.forEach(option => {
  option.addEventListener('click', () => {
      selectedkanban.innerText = option.innerText;
      selectkanban.classList.remove('select-clicked-kanban');
      caretkanban.classList.remove('caret-rotate-kanban');
      menukanban.classList.remove('menu-open-kanban');
    
      optionskanban.forEach(option => {
        option.classList.remove('active-kanban');
        });
          option.classList.add('active-kanban');
  });
});
});