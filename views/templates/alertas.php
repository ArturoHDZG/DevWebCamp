<?php foreach ($alertas as $key => $alerta) : ?>
  <?php foreach ($alerta as $mensaje) : ?>
    <div class="alerta alerta--<?php echo $key ?>">
      <?php echo $mensaje ?>
    </div>
  <?php endforeach; ?>
<?php endforeach; ?>
