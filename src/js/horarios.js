'use strict';

(function () {
  const horas = document.querySelector('#horas');

  if (horas) {
    const categoria = document.querySelector('[name="categoria_id"]');
    const dias = document.querySelectorAll('[name="dia"]');
    const inputHiddenDia = document.querySelector('[name="dia_id"]');
    const inputHiddenHora = document.querySelector('[name="hora_id"]');

    categoria.addEventListener('change', terminoBusqueda);
    dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));

    let busqueda = {
      categoria_id: +categoria.value || '',
      dia: +inputHiddenDia.value || ''
    }

    // Recuperar valores seleccionados para el formulario 'Editar'
    if (!Object.values(busqueda).includes('')) {

      async function recuperarValores() {
        await buscarEventos();

        const id = inputHiddenHora.value;
        const horaSeleccionada = document.querySelector(`[data-hora-id="${id}"]`);

        horaSeleccionada.classList.remove('horas__hora--deshabilitada');
        horaSeleccionada.classList.add('horas__hora--seleccionada');
        horaSeleccionada.onclick = seleccionarHora;
      }

      recuperarValores();
    }

    function terminoBusqueda(e) {
      busqueda[ e.target.name ] = e.target.value;

      // Reiniciar campos ocultos y el selector de horas
      inputHiddenHora.value = '';
      inputHiddenDia.value = '';
      const horaPrevia = document.querySelector('.horas__hora--seleccionada');

      if (horaPrevia) {
        horaPrevia.classList.remove('horas__hora--seleccionada');
      }

      if (Object.values(busqueda).includes('')) {
        return;
      }

      buscarEventos();
    }

    async function buscarEventos() {
      const { categoria_id, dia } = busqueda;
      const url = `/api/eventos-horario?categoria_id=${categoria_id}&dia_id=${dia}`;
      const resultado = await fetch(url);
      const eventos = await resultado.json();

      obtenerHorasDisponibles(eventos);
    }

    function obtenerHorasDisponibles(eventos) {
      // Reiniciar las horas
      const listadoHoras = document.querySelectorAll('#horas li');
      listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'));

      // Comprobar eventos ya tomados y deshabilitar ese horario
      const horasTomadas = eventos.map(evento => evento.hora_id);
      const listadoHorasArray = Array.from(listadoHoras);
      const resultado = listadoHorasArray.filter(
        li => !horasTomadas.includes(li.dataset.horaId)
      );

      resultado.forEach(li => li.classList.remove('horas__hora--deshabilitada'));

      const horasDisponibles = document.querySelectorAll(
        '#horas li:not(.horas__hora--deshabilitada)'
      );
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

      // Llenar el campo oculto del día seleccionado
      inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
    }
  }
})();
