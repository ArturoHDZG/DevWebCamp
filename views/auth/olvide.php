<main class="auth">
  <h2 class="auth__heading"><?php echo $titulo ?></h2>
  <p class="auth__texto">Recupera el acceso a tu Cuenta</p>

  <?php require_once __DIR__ . '/../templates/alertas.php' ?>

  <form class="formulario" method="POST" action="/olvide">
    <div class="formulario__campo">
      <label for="email" class="formulario__label">Email</label>
      <input
        id="email" name="email"
        type="email" class="formulario__input"
        placeholder="Ej. correo@dominio.com"
      >
    </div>
    <input type="submit" class="formulario__submit" value="Enviar Instrucciones">
  </form>
  <div class="acciones">
    <a href="/login" class="acciones__enlace">Iniciar Sesión</a>
    <a href="/registro" class="acciones__enlace">Crea una Cuenta</a>
  </div>
</main>
