<?php include_once __DIR__ . '/conferencias.php' ?>

<section class="resumen">
  <div class="resumen__grid">
    <div <?php echo aosAnimacion(); ?> class="resumen__bloque">
      <p class="resumen__texto resumen__texto--numero">
        <?php echo $ponentes; ?>
      </p>
      <p class="resumen__texto">Speakers</p>
    </div>

    <div <?php echo aosAnimacion(); ?> class="resumen__bloque">
      <p class="resumen__texto resumen__texto--numero">
        <?php echo $conferencias; ?>
      </p>
      <p class="resumen__texto">Conferencias</p>
    </div>

    <div <?php echo aosAnimacion(); ?> class="resumen__bloque">
      <p class="resumen__texto resumen__texto--numero">
        <?php echo $conferencias; ?>
      </p>
      <p class="resumen__texto">Workshops</p>
    </div>

    <div <?php echo aosAnimacion(); ?> class="resumen__bloque">
      <p class="resumen__texto resumen__texto--numero">
        500
      </p>
      <p class="resumen__texto">Asistentes</p>
    </div>
  </div>
</section>

<section class="speakers">
  <h2 class="speakers__heading">Speakers</h2>
  <p class="speakers__descripcion">Conoce a Nuestros Expertos de DevWebCamp</p>

  <div class="speakers__grid">
    <?php foreach ($todosPonentes as $ponente) : ?>
      <div <?php echo aosAnimacion(); ?> class="speaker">
        <picture>
          <source
            srcset="/img/speakers/<?php echo $ponente->imagen; ?>.webp"
            type="image/webp"
          >
          <img
            class="speaker__imagen"
            loading="lazy" width="200" height="300"
            src="/img/speakers/<?php echo $ponente->imagen; ?>.png"
            alt="Imagen Ponente"
          >
        </picture>

        <div class="speaker__informacion">
          <h4 class="speaker__nombre">
            <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
          </h4>
          <p class="speaker__ubicacion">
            <?php echo $ponente->ciudad . ', ' . $ponente->pais; ?>
          </p>

          <nav class="speaker-sociales">
            <?php if (!empty($ponente->sociales->facebook)) : ?>
                <a
                class="speaker-sociales__enlace"
                rel="noopener noreferrer"
                target="_blank"
                href="<?php echo $ponente->sociales->facebook; ?>"
                >
                <span class="speaker-sociales__ocultar">Facebook</span>
              </a>
            <?php endif; ?>

            <?php if (!empty($ponente->sociales->twitter)) : ?>
              <a
                class="speaker-sociales__enlace"
                rel="noopener noreferrer"
                target="_blank"
                href="<?php echo $ponente->sociales->twitter; ?>"
              >
                <span class="speaker-sociales__ocultar">Twitter</span>
              </a>
            <?php endif; ?>

            <?php if (!empty($ponente->sociales->youtube)) : ?>
              <a
                class="speaker-sociales__enlace"
                rel="noopener noreferrer"
                target="_blank"
                href="<?php echo $ponente->sociales->youtube; ?>"
              >
                <span class="speaker-sociales__ocultar">YouTube</span>
              </a>
            <?php endif; ?>

            <?php if (!empty($ponente->sociales->instagram)) : ?>
              <a
                class="speaker-sociales__enlace"
                rel="noopener noreferrer"
                target="_blank"
                href="<?php echo $ponente->sociales->instagram; ?>"
              >
                <span class="speaker-sociales__ocultar">Instagram</span>
              </a>
            <?php endif; ?>

            <?php if (!empty($ponente->sociales->tiktok)) : ?>
              <a
                class="speaker-sociales__enlace"
                rel="noopener noreferrer"
                target="_blank"
                href="<?php echo $ponente->sociales->tiktok; ?>"
              >
                <span class="speaker-sociales__ocultar">TikTok</span>
              </a>
            <?php endif; ?>

            <?php if (!empty($ponente->sociales->github)) : ?>
              <a
                class="speaker-sociales__enlace"
                rel="noopener noreferrer"
                target="_blank"
                href="<?php echo $ponente->sociales->github; ?>"
              >
                <span class="speaker-sociales__ocultar">GitHub</span>
              </a>
            <?php endif; ?>
          </nav>

          <ul class="speaker__listado-skills">
            <?php foreach ($ponente->tagsArray as $tag) : ?>
              <li class="speaker_skill"><?php echo $tag; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="boletos">
  <h2 class="boletos__heading">Boletos y Precios</h2>
  <p class="boletos__descripcion">Precios para DevWebCamp</p>

  <div class="boletos__grid">

    <div <?php echo aosAnimacion(); ?> class="boleto boleto--presencial">
      <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
      <p class="boleto__plan">Presencial</p>
      <p class="boleto__precio">&dollar;199.<span>99</span></p>
    </div>

    <div <?php echo aosAnimacion(); ?> class="boleto boleto--virtual">
      <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
      <p class="boleto__plan">Virtual</p>
      <p class="boleto__precio">&dollar;49.<span>99</span></p>
    </div>

    <div <?php echo aosAnimacion(); ?> class="boleto boleto--gratis">
      <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
      <p class="boleto__plan">Gratis</p>
      <p class="boleto__precio">&dollar;0.<span>00</span></p>
    </div>
  </div>

  <div class="boleto__enlace-contenedor">
    <a href="/paquetes" class="boleto__enlace">Ver Paquetes</a>
  </div>
</section>
