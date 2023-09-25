<main class="auth">
  <h2 class="auth__heading"><?php echo $titulo ?></h2>
  <p class="auth__texto">Regístrate en DevWebCamp</p>

  <form class="formulario">
    <div class="formulario__campo">
      <label for="nombre" class="formulario__label">Nombre</label>
      <input
        id="nombre" name="nombre"
        type="text" class="formulario__input"
        placeholder="Ej. Juan"
      >
    </div>
    <div class="formulario__campo">
      <label for="apellido" class="formulario__label">Apellidos</label>
      <input
        id="apellido" name="apellido"
        type="text" class="formulario__input"
        placeholder="Ej. Gómez"
      >
    </div>
    <div class="formulario__campo">
      <label for="email" class="formulario__label">Email</label>
      <input
        id="email" name="email"
        type="email" class="formulario__input"
        placeholder="Ej. correo@dominio.com"
      >
    </div>
    <div class="formulario__campo">
      <label for="password" class="formulario__label">Contraseña</label>
      <input
        id="password" name="password"
        type="password" class="formulario__input"
        placeholder="Escribe tu Contraseña"
      >
    </div>
    <div class="formulario__campo">
      <label for="password2" class="formulario__label">Repetir Contraseña</label>
      <input
        id="password2" name="password2"
        type="password" class="formulario__input"
        placeholder="Escribe tu Contraseña"
      >
    </div>
    <input type="submit" class="formulario__submit" value="Crear Cuenta">
  </form>
  <div class="acciones">
    <a href="/login" class="acciones__enlace">Iniciar Sesión</a>
    <a href="/olvide" class="acciones__enlace">Olvidé mi Contraseña</a>
  </div>
</main>
