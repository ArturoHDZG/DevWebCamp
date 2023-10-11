<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<main class="bloques">
  <div class="bloques__grid">
    <div class="bloque">
      <h3 class="bloque__heading">Últimos Registros</h3>
      <?php foreach ($registros as $registro): ?>
        <div class="bloque__contenido">
          <p class="bloque__texto">
            <?php echo $registro->usuario->nombre . ' ' . $registro->usuario->apellido; ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="bloque">
      <h3 class="bloque__heading">Ingresos Totales</h3>
      <p class="bloque__texto--cantidad">$<?php echo $ingresos; ?></p>
    </div>

    <div class="bloque">
      <h3 class="bloque__heading">Eventos con Menor Disponibilidad</h3>
      <?php foreach ($menosDisponible as $evento): ?>
        <div class="bloque__contenido">
          <p class="bloque__texto">
            <?php echo $evento->nombre; ?>
          </p>
          <p class="bloque__texto--disponibles">
            <?php echo '- ' . $evento->disponibles . ' Disponibles'; ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="bloque">
      <h3 class="bloque__heading">Eventos con Mayor Disponibilidad</h3>
      <?php foreach ($masDisponible as $evento): ?>
        <div class="bloque__contenido">
          <p class="bloque__texto">
            <?php echo $evento->nombre; ?>
          </p>
          <p class="bloque__texto--disponibles">
            <?php echo '- ' . $evento->disponibles . ' Disponibles'; ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
