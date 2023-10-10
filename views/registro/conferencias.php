<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">
  Elige hasta 5 eventos para asistir de forma presencial
</p>

<div class="eventos-registro">
  <main class="eventos-registro__listado">
    <h3 class="eventos-registro__heading--conferencias">&#60;Conferencias /></h3>
    <p class="eventos-registro__fecha">Sábado, 9 de diciembre</p>

    <div class="eventos-registro__grid">
      <?php foreach ($eventos['conferencias_s'] as $evento) : ?>
        <?php include __DIR__ . '/evento.php' ?>
      <?php endforeach; ?>
    </div>
    <p class="eventos-registro__fecha">Domingo, 10 de diciembre</p>

    <div class="eventos-registro__grid">
      <?php foreach ($eventos['conferencias_d'] as $evento) : ?>
        <?php include __DIR__ . '/evento.php' ?>
      <?php endforeach; ?>
    </div>
    <h3 class="eventos-registro__heading--workshops">&#60;Workshops /></h3>
    <p class="eventos-registro__fecha">Sábado, 9 de diciembre</p>

    <div class="eventos-registro__grid eventos--workshops">
      <?php foreach ($eventos['workshops_s'] as $evento) : ?>
        <?php include __DIR__ . '/evento.php' ?>
      <?php endforeach; ?>
    </div>
    <p class="eventos-registro__fecha">Domingo, 10 de diciembre</p>

    <div class="eventos-registro__grid eventos--workshops">
      <?php foreach ($eventos['workshops_d'] as $evento) : ?>
        <?php include __DIR__ . '/evento.php' ?>
      <?php endforeach; ?>
    </div>
  </main>
  <aside class="registro">
    <h2 class="registro__heading">&#60;Eventos Seleccionados /></h2>

    <div id="registro-resumen" class="registro__resumen"></div>
  </aside>
</div>
