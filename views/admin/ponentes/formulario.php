<fieldset class="formulario__fieldset">
  <legend class="formulario__legend">Información Personal</legend>

  <div class="formulario__campo">
    <label for="nombre" class="formulario__label">Nombre</label>
    <input
      id="nombre"
      name="nombre"
      type="text"
      class="formulario__input"
      placeholder="Nombre(s) del Ponente"
      value="<?php echo $ponente->nombre ?? ''; ?>"
    >
  </div>

  <div class="formulario__campo">
    <label for="apellido" class="formulario__label">Apellido</label>
    <input
      id="apellido"
      name="apellido"
      type="text"
      class="formulario__input"
      placeholder="Apellido(s) del Ponente"
      value="<?php echo $ponente->apellido ?? ''; ?>"
    >
  </div>
</fieldset>
