'use strict';

(function () {
  const ponentesInput = document.querySelector('#ponentes');

  if (ponentesInput) {
    let ponentes = [];
    let ponentesFiltrados = [];
    const listadoPonentes = document.querySelector('#listado-ponentes');

    obtenerPonentes();

    ponentesInput.addEventListener('input', buscarPonentes);

    async function obtenerPonentes() {
      const url = `/api/ponentes`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();

      formatearPonentes(resultado);
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
  }
})();
