<main class="registro">
  <h2 class="registro__heading"><?php echo $titulo; ?></h2>
  <p class="registro__descripcion">Elige tu Plan</p>

  <div class="paquetes__grid">
    <div class="paquete">
      <h3 class="paquete__nombre">Pase Gratis</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
      </ul>

      <div>
        <p class="paquete__precio">&dollar;0.<span>00</span></p>
        <form method="POST" action="/finalizar-registro/gratis">
          <input type="submit" class="paquetes__submit" value="Inscribirse">
        </form>
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Pase Presencial</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
        <li class="paquete__elemento">Pase por los 2 días</li>
        <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
        <li class="paquete__elemento">Acceso a las Grabaciones</li>
        <li class="paquete__elemento">Camisa del Evento</li>
        <li class="paquete__elemento">Comidas y Bebidas</li>
      </ul>
      <div>
        <p class="paquete__precio">&dollar;199.<span>99</span></p>
        <form method="POST" action="/finalizar-registro/presencial">
          <input type="submit" class="paquetes__submit" value="Comprar Pase">
        </form>
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Pase Virtual</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
        <li class="paquete__elemento">Pase por los 2 días</li>
        <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
        <li class="paquete__elemento">Acceso a las Grabaciones</li>
      </ul>
      <div>
        <p class="paquete__precio">&dollar;49.<span>99</span></p>
        <form method="POST" action="/finalizar-registro/virtual">
          <input type="submit" class="paquetes__submit" value="Comprar Pase">
        </form>
      </div>
    </div>
  </div>
</main>
