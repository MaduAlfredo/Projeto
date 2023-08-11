document.addEventListener('DOMContentLoaded', function() {

var checkBox = document.getElementById("reg-log");

checkBox.addEventListener('click', function(){
  var view = document.querySelector('.real-kanban');
  var elements = document.querySelectorAll('.content');
  var types = document.querySelectorAll('.status');
  var descricoes = document.querySelectorAll('.descricao');

  if (checkBox.checked){
    elements.forEach(element => {
        element.classList.replace('card', 'lista');
    });
    types.forEach(type => {
        type.classList.replace('type-card', 'type-lista');
    })
    descricoes.forEach(descricao => {
      descricao.classList.replace('descricao-card', 'descricao-lista');
    })
    view.classList.replace('cards', 'listas');
    } else {
      elements.forEach(element => {
        element.classList.replace('lista', 'card');
      });
      types.forEach(type => {
        type.classList.replace('type-lista', 'type-card');
      })
      descricoes.forEach(descricao => {
        descricao.classList.replace('descricao-lista', 'descricao-card');
      })
      view.classList.replace('listas', 'cards');
    }
})


async function enviarDados(){
  const listaSelecao = document.getElementById("selecao").children;
      const dadosParaEnviar = [];

      for (let i = 0; i < listaSelecao.length; i++) {
        dadosParaEnviar.push(listaSelecao[i].textContent);
      }
      
      enviarDadosParaServidor(dadosParaEnviar);
    }

    const formulario = document.querySelector('.form-content');

    formulario.addEventListener('submit', async (e) => {
      e.preventDefault();
    
      const dadosForm = new FormData(formulario);
    
      // Extrair os dados do FormData e preparar para enviar
      const dadosParaEnviar = {};
      for (const [key, value] of dadosForm.entries()) {
        dadosParaEnviar[key] = value;
      }
    
      const data = await fetch('../../php/processtasks.php', {
        method: 'POST',
        body: JSON.stringify(dadosParaEnviar), // Enviar como JSON
        headers: {
          'Content-Type': 'application/json' // Indicar que o conteúdo é JSON
        }
      });
    
      const res = await data.json();
      }
    );

const botao = document.querySelector('.profile-left');

botao.onclick = () => {
  location = './settings.html';
}});
