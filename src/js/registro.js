import Swal from 'sweetalert2';

(function () {
  const registroResumen = document.querySelector('#registro-resumen');
  let eventos = [];

  if (registroResumen) {
    const resumen = document.querySelector('.registro__resumen');
    const eventosBoton = document.querySelectorAll('.evento__agregar');

    const formularioRegistro = document.querySelector('#registro');
    formularioRegistro.addEventListener('submit', submitFormulario);

    eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

    mostrarEventos();

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
      } else {
        const noRegistro = document.createElement('P');
        noRegistro.classList.add('registro__texto');
        noRegistro.textContent = 'Todavía no hay eventos, puedes añadir un máximo de 5 eventos de la lista de Conferencias y Workshops';
        resumen.appendChild(noRegistro);
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

    async function submitFormulario(e) {
      e.preventDefault();

      // Registrar el Regalo
      const regaloId = document.querySelector('#regalo').value;
      const eventosId = eventos.map(evento => evento.id);

      if (eventosId.length === 0 || regaloId === '') {
        Swal.fire({
          title: 'Error',
          text: 'Elige al Menos un Evento y el Regalo',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: '#007df4'
        });
        return;
      }

      const datos = new FormData();
      datos.append('eventos', eventosId);
      datos.append('regalo_id', regaloId);
      const url = '/finalizar-registro/conferencias';
      const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
      })

      const resultado = await respuesta.json();
      console.log(resultado);
    }
  }
})();
