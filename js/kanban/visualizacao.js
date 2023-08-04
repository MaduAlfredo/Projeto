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

/* async function enviarDados(){
  const listaSelecao = document.getElementById("selecao").children;
      const dadosParaEnviar = [];

      for (let i = 0; i < listaSelecao.length; i++) {
        dadosParaEnviar.push(listaSelecao[i].textContent);
      }
      
      enviarDadosParaServidor(dadosParaEnviar);
    }
   */
const formulario = document.querySelector('.form-content');

formulario.addEventListener('submit', async (e) => {
  e.preventDefault();

  const dadosForm = new FormData(formulario);
  dadosForm.append('dados', e.join(', '));

  const data = await fetch('../../php/processtasks.php', {
    method: 'POST',
    body: dadosForm
  })

  const res = await data.json();
})
/* async function enviarDadosParaServidor(dados) {
      // Cria um objeto FormData para enviar os dados do formulário
  const formData = new FormData();
  formData.append('dados', dados.join(', ')); // Junte os dados em uma única string

  const data =  await fetch('../../php/processtasks.php', {
    method: 'POST',
    body: formData
  });

    const res = await data.json();
} */

const botao = document.querySelector('.profile-left');

botao.onclick = () => {
  location = './settings.html';
}
