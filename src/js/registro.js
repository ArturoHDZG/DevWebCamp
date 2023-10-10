'use strict';

(function () {
  const registroResumen = document.querySelector('#registro-resumen');

  if (registroResumen) {
    let eventos = [];
    const eventosBoton = document.querySelectorAll('.evento__agregar');

    eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

    function seleccionarEvento({target}) {
      eventos = [ ...eventos, {
        id: target.dataset.id,
        titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim()
      } ];

      // Deshabilitar evento seleccionado
      target.disabled = true;
      console.log(eventos);
    }
  }
})();
