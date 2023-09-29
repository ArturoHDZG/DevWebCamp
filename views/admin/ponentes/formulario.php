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

  <div class="formulario__campo">
    <label for="ciudad" class="formulario__label">Ciudad</label>
    <input
      id="ciudad"
      name="ciudad"
      type="text"
      class="formulario__input"
      placeholder="Ciudad del Ponente"
      value="<?php echo $ponente->ciudad ?? ''; ?>"
    >
  </div>

  <div class="formulario__campo">
    <label for="pais" class="formulario__label">País</label>
    <input
      id="pais"
      name="pais"
      type="text"
      class="formulario__input"
      placeholder="País del Ponente"
      value="<?php echo $ponente->pais ?? ''; ?>"
    >
  </div>

  <div class="formulario__campo">
    <label for="imagen" class="formulario__label">Imagen</label>
    <input
      id="imagen"
      name="imagen"
      type="file"
      class="formulario__input formulario__input--file"
    >
  </div>
</fieldset>

<fieldset class="formulario__fieldset">
  <legend class="formulario__legend">Información Profesional</legend>

  <div class="formulario__campo">
    <label for="tags-input" class="formulario__label">Temas de Experiencia</label>
    <p class="formulario__p">*Separado por comas</p>
    <input
      id="tags-input"
      type="text"
      class="formulario__input formulario__input",
      placeholder="Ej. Node.js, UI/UX, Git, Java"
    >

    <div id="tags" class="formulario__listado"></div>
    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
  </div>
</fieldset>
