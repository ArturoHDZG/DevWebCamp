<header class="header">
  <div class="header__contenedor">

    <nav class="header__navegacion" aria-label="Barra de Navegación">
      <?php if (isAuth()) : ?>
        <a
          href="<?php echo isAdmin() ? '/admin/dashboard' : '/finalizar-registro'; ?>"
          class="header__enlace"
        >
          Administrar
        </a>
        <form class="header__form" method="POST" action="/logout">
          <input class="header__submit" type="submit" value="Cerrar Sesión">
        </form>
      <?php else : ?>
        <a href="/registro" class="header__enlace">Registro</a>
        <a href="/login" class="header__enlace">Iniciar Sesión</a>
      <?php endif; ?>
    </nav>

    <div class="header__contenido">
      <a href="/">
        <h1 class="header__logo">&#60;DevWebCamp /></h1>
      </a>
      <p class="header__texto">Diciembre 9-10 - 2023</p>
      <p class="header__texto header__texto--modalidad">En Línea - Presencial</p>
      <a href="/registro" class="header__boton">Comprar Pase</a>
    </div>

  </div>
</header>

<div class="barra">
  <div class="barra__contenido">

    <a href="/">
      <h2 class="barra__logo">&#60;DevWebCamp /></h2>
    </a>

    <nav class="navegacion" aria-label="Barra de Navegación">
      <a
        href="/devwebcamp"
        class="
          navegacion__enlace <?php echo paginaActual('/devwebcamp') ? 'navegacion__enlace--actual' : ''; ?>
        "
      >
        Evento
      </a>
      <a
        href="/paquetes"
        class="
          navegacion__enlace <?php echo paginaActual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>
        "
      >
        Paquetes
      </a>
      <a
        href="/workshops-conferencias"
        class="
          navegacion__enlace <?php echo paginaActual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>
        "
      >
        Workshops / Conferencias
      </a>
      <a
        href="/registro"
        class="
          navegacion__enlace <?php echo paginaActual('/registro') ? 'navegacion__enlace--actual' : ''; ?>
        "
      >
        Comprar Pase
      </a>
    </nav>

  </div>
</div>
