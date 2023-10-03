'use strict';

(function () {
  const horas = document.querySelector('#horas');

  if (horas) {
    let busqueda = {
      categoria_id: '',
      dia: ''
    }

    const categoria = document.querySelector('[name="categoria_id"]');
    const dias = document.querySelectorAll('[name="dia"]');
    const inputHiddenDia = document.querySelector('[name="dia_id"]');
    const inputHiddenHora = document.querySelector('[name="hora_id"]');

    categoria.addEventListener('change', terminoBusqueda);
    dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));

    function terminoBusqueda(e) {
      busqueda[ e.target.name ] = e.target.value;
      buscarEventos();
    }

    async function buscarEventos() {
      const { categoria_id, dia } = busqueda;
      const url = `/api/eventos-horario?categoria_id=${categoria_id}&dia_id=${dia}`;
      const resultado = await fetch(url);
      const eventos = await resultado.json();

      obtenerHorasDisponibles();
    }

    function obtenerHorasDisponibles() {
      const horasDisponibles = document.querySelectorAll('#horas li');
      horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));
    }

    function seleccionarHora(e) {
      // Deshabilitar selección anterior
      const horaPrevia = document.querySelector('.horas__hora--seleccionada');

      if (horaPrevia) {
        horaPrevia.classList.remove('horas__hora--seleccionada');
      }

      //Agregar clase a hora seleccionada
      e.target.classList.add('horas__hora--seleccionada');
      inputHiddenHora.value = e.target.dataset.horaId;
    }
  }
})();
