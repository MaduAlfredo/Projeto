const dropdowns = document.querySelectorAll('.dropdown-home');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select-home');
    const caret = dropdown.querySelector('.caret-home');
    const menu = dropdown.querySelector('.menu-home');
    const options = dropdown.querySelectorAll('.menu-home li');
    const selected = dropdown.querySelector('.selected-home');

  
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
        option.classList.remove('active-home');
        });
          option.classList.add('active-home');
  });
});
});