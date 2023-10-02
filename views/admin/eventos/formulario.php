<fieldset class="formulario__fieldset">
  <legend class="formulario__legend">Información del Evento</legend>

  <div class="formulario__campo">
    <label for="nombre" class="formulario__label">Nombre</label>
    <input
      id="nombre"
      name="nombre"
      type="text"
      class="formulario__input"
      placeholder="Nombre del Evento"
      value="<?php echo $evento->nombre ?? ''; ?>"
    >
  </div>

  <div class="formulario__campo">
    <label for="descripcion" class="formulario__label">Descripción</label>
    <textarea
      id="descripcion"
      name="descripcion"
      class="formulario__input"
      placeholder="Descripción del Evento"
      value="<?php echo $evento->descripcion ?? ''; ?>"
    ></textarea>
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
    <label for="categoria" class="formulario__label">Tipo de Evento</label>
    <select
      id="categoria"
      name="categoria_id"
      class="formulario__select"
    >
      <option value="">-- Seleccionar --</option>
      <?php foreach ($categorias as $categoria) : ?>
        <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="formulario__campo">
    <label for="categoria" class="formulario__label">Selecciona el Día</label>

    <div class="formulario__radio">
      <?php foreach ($dias as $dia) : ?>
      <div>
        <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
        <input
          id="<?php echo strtolower($dia->nombre); ?>"
          name="dia"
          type="radio"
          value="<?php echo $dia->id; ?>"
        >
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</fieldset>
