// Função para mostrar/ocultar os pontos
function togglePoints() {
    let points = document.querySelector('.points-value');
    if (points.textContent === '****') {
      points.textContent = '1000'; // Altere aqui para a quantidade real de pontos
    } else {
      points.textContent = '****';
    }
  }
  
  // Função para mostrar/ocultar o menu dropdown
  function toggleMenu() {
    let dropdownMenu = document.querySelector('.dropdown-menu');
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
  }