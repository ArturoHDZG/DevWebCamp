<main class="auth">
  <h2 class="auth__heading"><?php echo $titulo ?></h2>
  <p class="auth__texto">Escribe una nueva contraseña</p>

  <?php require_once __DIR__ . '/../templates/alertas.php' ?>

  <?php if ($token_valido) : ?>
    <form class="formulario" method="POST">
      <div class="formulario__campo">
        <label for="password" class="formulario__label">Nueva Contraseña</label>
        <input
          id="password" name="password"
          type="password" class="formulario__input"
          placeholder="Escribe tu Nueva Contraseña"
        >
      </div>
      <input type="submit" class="formulario__submit" value="Confirmar">
    </form>
  <?php endif; ?>

  <div class="acciones">
    <a href="/login" class="acciones__enlace">Iniciar Sesión</a>
    <a href="/registro" class="acciones__enlace">Crea una Cuenta</a>
  </div>

</main>
