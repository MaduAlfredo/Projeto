const dropdowns = document.querySelectorAll('.dropdown-home-kanban');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select-home-kanban');
    const caret = dropdown.querySelector('.caret-home-kanban');
    const menu = dropdown.querySelector('.menu-home-kanban');
    const options = dropdown.querySelectorAll('.menu-home-kanban li');
    const selected = dropdown.querySelector('.selected-home-kanban');

  
select.addEventListener('click-kanban', () => {
  select.classList.toggle('select-clicked-kanban');
  caret.classList.toggle('caret-rotate-kanban');
  menu.classList.toggle('menu-open-kanban');
});

options.forEach(option => {
  option.addEventListener('click-kanban', () => {
      selected.innerText = option.innerText;
      select.classList.remove('select-clicked-kanban');
      caret.classList.remove('caret-rotate-kanban');
      menu.classList.remove('menu-open-kanban');
    
      options.forEach(option => {
        option.classList.remove('active-home-kanban');
        });
          option.classList.add('active-home-kanban');
  });
});
});