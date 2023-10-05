<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
  <a href="/admin/eventos/crear" class="dashboard__boton">
    <i class="fa-solid fa-circle-plus"></i>
    Añadir Evento
  </a>
</div>

<div class="dashboard__contenedor">
  <?php if (!empty($eventos)): ?>
    <table class="table" aria-describedby="Listado Eventos">
      <thead class="table__thead">
        <tr>
          <th class="table__th" scope="col">Evento</th>
          <th class="table__th" scope="col">Categoría</th>
          <th class="table__th" scope="col">Dia y Hora</th>
          <th class="table__th" scope="col">Ponente</th>
          <th class="table__th" scope="col"></th>
        </tr>
      </thead>

      <tbody class="table__tbody">
        <?php foreach ($eventos as $evento) : ?>
          <tr class="table__tr">
            <td class="table__td">
              <?php echo $evento->nombre; ?>
            </td>
            <td class="table__td">
              <?php echo $evento->categoria->nombre; ?>
            </td>
            <td class="table__td">
              <?php echo $evento->dia->nombre . ', ' . $evento->hora->hora; ?>
            </td>
            <td class="table__td">
              <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
            </td>

            <td class="table__td--acciones">
              <a
                href="/admin/eventos/editar?id=<?php echo $evento->id ?>"
                class="table__accion table__accion--editar"
              >
                <i class="fa-solid fa-pencil"></i>
                Editar
              </a>

              <form method="POST" action="/admin/eventos/eliminar" class="table__formulario">
                <input type="hidden" name="id" value="<?php echo $evento->id ?>">
                <button class="table__accion table__accion--eliminar" type="submit">
                  <i class="fa-solid fa-circle-xmark"></i>
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <p class="text-center">No Hay Eventos Registrados</p>
  <?php endif; ?>
</div>

<?php echo $paginacion ?>
