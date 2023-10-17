document.addEventListener('DOMContentLoaded', function () {
  const fondohuellas = document.querySelector('.fondohuellas');
  const huellitaImgPath = '../assets/images/huellita.png'
  function mostrarHuellita() {
    const huella = document.createElement('img');
    huella.src = huellitaImgPath;
    huella.className = 'huella';
    huella.style.opacity = '0.5';

    const ejex = Math.random() * (window.innerWidth - 30);
    const ejey = Math.random() * (window.innerHeight - 30);
    huella.style.left = ejex + 'px';
    huella.style.top = ejey + 'px';
    fondohuellas.appendChild(huella);
    setTimeout(() => {
      huella.remove();
    }, 4000);
  }

  setInterval(mostrarHuellita, 1000);
});

