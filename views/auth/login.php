<main class="auth">
  <h2 class="auth__heading"><?php echo $titulo ?></h2>
  <p class="auth__texto">Inicia Sesión en DevWebCamp</p>

  <form class="formulario">
    <div class="formulario__campo">
      <label for="email" class="formulario__label">Email</label>
      <input id="email" name="email" type="email" class="formulario__input" placeholder="Ej. correo@dominio.com">
    </div>
    <div class="formulario__campo">
      <label for="password" class="formulario__label">Contraseña</label>
      <input
        id="password" name="password" type="password"      class="formulario__input" placeholder="Escribe tu Contraseña"
      >
    </div>
    <input type="submit" class="formulario__submit" value="Iniciar Sesión">
  </form>
  <div class="acciones">
    <a href="/registro" class="acciones__enlace">Crea una Cuenta</a>
    <a href="/olvide" class="acciones__enlace">Olvidé mi Contraseña</a>
  </div>
</main>
