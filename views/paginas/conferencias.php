<main class="agenda">
  <h2 class="agenda__heading"><?php echo $titulo; ?></h2>
  <p class="agenda__descripcion">
    Conferencias y Talleres Dictados por Expertos en Desarrollo Web
  </p>

  <div class="eventos">
    <h3 class="eventos__heading">&lt;Conferencias /></h3>
    <p class="eventos__fecha">Sábado, 9 de diciembre</p>

    <div class="eventos__listado">
      <?php foreach ($eventos['conferencias_s'] as $evento) : ?>

        <div class="evento">
          <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>

          <div class="evento__informacion">
            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

            <div>
              <p class="evento__informacion"><?php echo $evento->descripcion; ?></p>
            </div>

            <div class="evento__autor-info">
              <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
              </picture>
              <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <p class="eventos__fecha">Domingo, 10 de diciembre</p>

    <div class="eventos__listado">
      <?php foreach ($eventos['conferencias_d'] as $evento) : ?>

        <div class="evento">
          <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>

          <div class="evento__informacion">
            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

            <div>
              <p class="evento__informacion"><?php echo $evento->descripcion; ?></p>
            </div>

            <div class="evento__autor-info">
              <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
              </picture>
              <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
              </p>
            </div>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

  </div>

  <div class="eventos eventos--workshops">
    <h3 class="eventos__heading">&lt;Workshops /></h3>
    <p class="eventos__fecha">Sábado, 9 de diciembre</p>
    <div class="eventos__listado">
      <?php foreach ($eventos['workshops_s'] as $evento) : ?>

        <div class="evento">
          <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>

          <div class="evento__informacion">
            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

            <div>
              <p class="evento__informacion"><?php echo $evento->descripcion; ?></p>
            </div>

            <div class="evento__autor-info">
              <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
              </picture>
              <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
              </p>
            </div>

          </div>

        </div>

      <?php endforeach; ?>
    </div>
    <p class="eventos__fecha">Domingo, 10 de diciembre</p>
    <div class="eventos__listado">
      <?php foreach ($eventos['workshops_d'] as $evento) : ?>

        <div class="evento">
          <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>

          <div class="evento__informacion">
            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

            <div>
              <p class="evento__informacion"><?php echo $evento->descripcion; ?></p>
            </div>

            <div class="evento__autor-info">
              <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
              </picture>
              <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
              </p>
            </div>

          </div>

        </div>

      <?php endforeach; ?>
    </div>
  </div>

</main>
