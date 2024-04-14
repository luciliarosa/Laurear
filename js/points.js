// Função para mostrar/ocultar os pontos
function togglePoints() {
    let points = document.querySelector('.points-value');
    if (points.textContent === '****') {
      points.textContent = '1000'; // Altere aqui para a quantidade real de pontos
    } else {
      points.textContent = '****';
    }
  }
