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
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <p class="text-center">No Hay Eventos Registrados</p>
  <?php endif; ?>
</div>

<?php echo $paginacion ?>
