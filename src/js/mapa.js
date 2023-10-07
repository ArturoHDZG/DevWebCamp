'use strict';

const lat = 18.804663;
const lng = -99.2230604;
const zoom = 16;

if (document.querySelector('#mapa')) {
  const map = L.map('mapa').setView([lat, lng], zoom);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([lat, lng]).addTo(map)
    .bindPopup(`
      <h2 class="mapa__heading">DevWebCamp</h2>
      <p class="mapa__texto">Tecnológico de Monterrey Campus Cuernavaca</p>
    `)
    .openPopup();
}
