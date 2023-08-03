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

function enviarDados(){
  const listaSelecao = document.getElementById("selecao").children;
            const dadosParaEnviar = [];

            for (let i = 0; i < listaSelecao.length; i++) {
                dadosParaEnviar.push(listaSelecao[i].textContent);
            }

            // Chamada de função para enviar os dados para o servidor
            enviarDadosParaServidor(dadosParaEnviar);
        }

        function enviarDadosParaServidor(dados) {
            // Implementar o envio dos dados para o servidor aqui
            // Você pode usar AJAX ou Fetch API para enviar os dados para o backend.
        }
