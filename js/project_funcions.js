//Function1 

// Obtém uma referência para o botão e para o contêiner onde as divs serão adicionadas
const botaoCriarDiv = document.getElementById('criarDiv');
const containerDiv = document.getElementById('containerDiv');

// Função para criar uma nova div
function criarDiv() {
    // Cria um elemento div
    const novaDiv = document.createElement('div');
    
    // Adiciona a classe "project_items" à div
    novaDiv.classList.add('project_items');
    
    // Adiciona algum conteúdo à div
    novaDiv.textContent = 'Nova div criada!';
    
    // Adiciona a nova div ao contêiner
    containerDiv.appendChild(novaDiv);    
  }
