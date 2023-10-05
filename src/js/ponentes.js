'use strict';

(function () {
  const ponentesInput = document.querySelector('#ponentes');

  if (ponentesInput) {
    let ponentes = [];
    let ponentesFiltrados = [];
    const listadoPonentes = document.querySelector('#listado-ponentes');
    const ponenteHidden = document.querySelector('[name="ponente_id"]');

    obtenerPonentes();

    ponentesInput.addEventListener('input', buscarPonentes);

    if (ponenteHidden.value) {

      async function recuperarPonente () {
        const ponente = await obtenerPonente(ponenteHidden.value);
        const { nombre, apellido } = ponente;

        // Insertar Ponente
        const ponenteDOM = document.createElement('LI');
        ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado');
        ponenteDOM.textContent = `${nombre} ${apellido}`;
        listadoPonentes.appendChild(ponenteDOM);
      }

      recuperarPonente();
    }

    async function obtenerPonentes() {
      const url = `/api/ponentes`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();

      formatearPonentes(resultado);
    }

    async function obtenerPonente(id) {
      const url = `/api/ponente?id=${id}`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();
      return resultado;
    }

    function formatearPonentes(arrayPonentes = []) {
      ponentes = arrayPonentes.map(ponente => {
        return {
          id: ponente.id,
          nombre: `${ponente.nombre.trim()} ${ponente.apellido}`
        }
      });
    }

    function buscarPonentes(e) {
      const buscar = e.target.value;

      if (buscar.length >= 3) {
        const expRegular = new RegExp(buscar.normalize('NFD').replace(/[\u0300-\u036f]/g, ""), "i");

        ponentesFiltrados = ponentes.filter(ponente => {

          if (ponente.nombre.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().search(expRegular) != -1) {
            return ponente;
          }
        });
      } else {
        ponentesFiltrados = [];
      }

      mostrarPonentes();
    }

    function mostrarPonentes() {

      while (listadoPonentes.firstChild) {
        listadoPonentes.removeChild(listadoPonentes.firstChild);
      }

      if (ponentesFiltrados.length > 0) {

        ponentesFiltrados.forEach(ponente => {
          const ponenteHTML = document.createElement('LI');
          ponenteHTML.classList.add('listado-ponentes__ponente');
          ponenteHTML.textContent = ponente.nombre;
          ponenteHTML.dataset.ponenteId = ponente.id;
          ponenteHTML.onclick = seleccionarPonente;

          // Añadir al DOM
          listadoPonentes.appendChild(ponenteHTML);
        });
      } else {
        const noResultados = document.createElement('P');

        noResultados.classList.add('listado-ponentes__no-resultados');

        if(ponentesInput.value.length >=3 ) {
          noResultados.textContent = 'No hay resultados para tu búsqueda'
        }

        // Añadir al DOM
        listadoPonentes.appendChild(noResultados);
      }
    }

    function seleccionarPonente(e) {
      const ponente = e.target;

      // Remover Ponente Resaltado Anterior
      const ponentePrevio = document.querySelector(
        '.listado-ponentes__ponente--seleccionado'
      );

      if (ponentePrevio) {
        ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');
      }

      ponente.classList.add('listado-ponentes__ponente--seleccionado');
      ponenteHidden.value = ponente.dataset.ponenteId;
    }
  }
})();
