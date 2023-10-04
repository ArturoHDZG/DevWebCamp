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
    ><?php echo $evento->descripcion ?? ''; ?></textarea>
  </div>

  <div class="formulario__campo">
    <label for="categoria" class="formulario__label">Tipo de Evento</label>
    <select
      id="categoria"
      name="categoria_id"
      class="formulario__select"
    >
      <option value="" disabled selected>-- Seleccionar --</option>
      <?php foreach ($categorias as $categoria) : ?>
        <option
          <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : ''; ?>
          value="<?php echo $categoria->id; ?>">
            <?php echo $categoria->nombre; ?>
        </option>
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
    <input type="hidden" name="dia_id" value="">
  </div>

  <div id="horas" class="formulario__campo">
    <label class="formulario__label">Seleccionar Hora</label>
    <p class="formulario__p">*Debes Seleccionar primero una Categoría y un Día</p>
    <ul class="horas">
      <?php foreach ($horas as $hora) : ?>
        <li
          data-hora-id="<?php echo $hora->id; ?>"
          class="horas__hora horas__hora--deshabilitada"
        >
          <?php echo $hora->hora; ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <input type="hidden" name="hora_id" value="">
  </div>
</fieldset>

<fieldset class="formulario__fieldset">
  <legend class="formulario__legend">Información Adicional</legend>

  <div class="formulario__campo">
    <label for="ponentes" class="formulario__label">Ponente</label>
    <input
      id="ponentes"
      type="text"
      class="formulario__input"
      placeholder="Buscar Ponente..."
    >
    <ul id="listado-ponentes" class="listado-ponentes"></ul>
    <input type="hidden" name="ponente_id" value="">
  </div>

  <div class="formulario__campo">
    <label for="disponibles" class="formulario__label">Cupos</label>
    <input
      id="disponibles"
      name="disponibles"
      type="number"
      min="1"
      class="formulario__input"
      placeholder="Ej. 20"
      value="<?php echo $evento->disponibles ?? ''; ?>"
    >
  </div>
</fieldset>
