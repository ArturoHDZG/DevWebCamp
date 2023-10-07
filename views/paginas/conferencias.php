<main class="agenda">
  <h2 class="agenda__heading"><?php echo $titulo; ?></h2>
  <p class="agenda__descripcion">
    Conferencias y Talleres Dictados por Expertos en Desarrollo Web
  </p>

  <div class="eventos">
    <h3 class="eventos__heading">&lt;Conferencias /></h3>
    <p class="eventos__fecha">Sábado, 9 de diciembre</p>

    <div class="eventos__listado slider swiper">
      <div class="swiper-wrapper">
        <?php foreach ($eventos['conferencias_s'] as $evento) : ?>

          <?php include __DIR__ . '../../templates/evento.php' ?>

        <?php endforeach; ?>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <p class="eventos__fecha">Domingo, 10 de diciembre</p>

    <div class="eventos__listado slider swiper">
      <div class="swiper-wrapper">
        <?php foreach ($eventos['conferencias_d'] as $evento) : ?>

          <?php include __DIR__ . '../../templates/evento.php' ?>

        <?php endforeach; ?>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>

  <div class="eventos eventos--workshops">
    <h3 class="eventos__heading">&lt;Workshops /></h3>
    <p class="eventos__fecha">Sábado, 9 de diciembre</p>

    <div class="eventos__listado slider swiper">

      <div class="swiper-wrapper">
        <?php foreach ($eventos['workshops_s'] as $evento) : ?>

          <?php include __DIR__ . '../../templates/evento.php' ?>

        <?php endforeach; ?>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <p class="eventos__fecha">Domingo, 10 de diciembre</p>

    <div class="eventos__listado slider swiper">

      <div class="swiper-wrapper">
        <?php foreach ($eventos['workshops_d'] as $evento) : ?>

          <?php include __DIR__ . '../../templates/evento.php' ?>

        <?php endforeach; ?>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</main>
