'use strict';

(function () {
  const ponentesInput = document.querySelector('#ponentes');

  if (ponentesInput) {
    let ponentes = [];
    let ponentesFiltrados = [];

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

      if (buscar.length > 3) {
        const expRegular = new RegExp(buscar, "i");

        ponentesFiltrados = ponentes.filter(ponente => {

          if (ponente.nombre.toLowerCase().search(expRegular) != -1) {
            return ponente;
          }
        });
        console.log(ponentesFiltrados);
      }
    }
  }
})();
