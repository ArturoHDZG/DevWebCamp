import Swal from 'sweetalert2';

(function () {
  const registroResumen = document.querySelector('#registro-resumen');

  if (registroResumen) {
    let eventos = [];
    const resumen = document.querySelector('.registro__resumen');
    const eventosBoton = document.querySelectorAll('.evento__agregar');

    eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

    function seleccionarEvento({ target }) {

      if (eventos.length < 5) {
        // Deshabilitar evento seleccionado
        target.disabled = true;

        eventos = [ ...eventos, {
          id: target.dataset.id,
          titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim()
        } ];

        mostrarEventos();
      } else {
        Swal.fire({
          title: 'Error',
          text: 'Solamente se pueden seleccionar un máximo de 5 eventos',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: '#007df4'
        });
      }
    }

    function mostrarEventos() {
      limpiarEventos();

      if (eventos.length > 0) {
        eventos.forEach(evento => {
          const eventoDOM = document.createElement('DIV');
          eventoDOM.classList.add('registro__evento');

          const titulo = document.createElement('H3');
          titulo.classList.add('registro__nombre');
          titulo.textContent = evento.titulo;

          const botonEliminar = document.createElement('BUTTON');
          botonEliminar.classList.add('registro__eliminar');
          botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
          botonEliminar.onclick = function () {
            eliminarEvento(evento.id);
          }

          // Render al Evento
          eventoDOM.appendChild(titulo);
          eventoDOM.appendChild(botonEliminar);
          resumen.appendChild(eventoDOM);
        });
      }
    }

    function eliminarEvento(id) {
      eventos = eventos.filter(evento => evento.id !== id);
      const botonAgregar = document.querySelector(`[data-id="${id}"]`);
      botonAgregar.disabled = false;

      mostrarEventos();
    }

    function limpiarEventos() {
      while (resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
      }
    }
  }
})();
