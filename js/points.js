// Função para mostrar/ocultar os pontos
function togglePoints() {
  let points = document.querySelector('.points-value');
  let eyeIcon = document.getElementById('eyeIcon');
  if (points.textContent === '****') {
    points.textContent = '1000'; // Altere aqui para a quantidade real de pontos
    eyeIcon.className = 'bi bi-eye'; // Ícone do olho aberto
  } else {
    points.textContent = '****';
    eyeIcon.className = 'bi bi-eye-slash'; // Ícone do olho fechado
  }
}
