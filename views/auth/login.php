<main class="auth">
  <h2 class="auth__heading"><?php echo $titulo ?></h2>
  <p class="auth__text">Inicia Sesión en DevWebCamp</p>

  <form class="form">
    <div class="form__field">
      <label for="email" class="form__label">Email</label>
      <input id="email" name="email" type="email" class="form__input" placeholder="Ej. correo@dominio.com">
    </div>
    <div class="form__field">
      <label for="password" class="form__label">Contraseña</label>
      <input id="password" name="password" type="password" class="form__input" placeholder="Escribe tu Contraseña">
    </div>
    <input type="submit" class="form__submit" value="Iniciar Sesión">
  </form>
  <div class="actions">
    <a href="/registro" class="actions__link">Crea una Cuenta</a>
    <a href="/olvide" class="actions__link">Olvidé mi Contraseña</a>
  </div>
</main>
