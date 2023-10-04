'use strict';

(function () {
  const ponentesInput = document.querySelector('#ponentes');

  if (ponentesInput) {
    let ponentes = [];
    let ponentesFiltrados = [];

    obtenerPonentes();

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
      console.log(ponentes);
    }
  }
})();
