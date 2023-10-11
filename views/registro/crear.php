<main class="registro">
  <h2 class="registro__heading"><?php echo $titulo; ?></h2>
  <p class="registro__descripcion">Elige tu Plan</p>

  <div class="paquetes__grid">
    <div class="paquete">
      <h3 class="paquete__nombre">Pase Gratis</h3>

      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
      </ul>

      <div class="paquete__gratis">
        <p class="paquete__precio">&dollar;0.<span>00</span></p>
        <form method="POST" action="/finalizar-registro/gratis">
          <input type="submit" class="paquetes__submit" value="Inscribirse">
        </form>
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Pase Presencial</h3>

      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
        <li class="paquete__elemento">Pase por los 2 días</li>
        <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
        <li class="paquete__elemento">Acceso a las Grabaciones</li>
        <li class="paquete__elemento">Camisa del Evento</li>
        <li class="paquete__elemento">Comidas y Bebidas</li>
      </ul>

      <div>
        <p class="paquete__precio">&dollar;199.<span>99</span></p>

        <div id="smart-button-container">
          <div style="text-align: center;">
            <div id="paypal-button-container--1"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Pase Virtual</h3>

      <ul class="paquete__lista">
        <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
        <li class="paquete__elemento">Pase por los 2 días</li>
        <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
        <li class="paquete__elemento">Acceso a las Grabaciones</li>
      </ul>

      <div>
        <p class="paquete__precio">&dollar;49.<span>99</span></p>

        <div id="smart-button-container">
          <div style="text-align: center;">
            <div id="paypal-button-container--2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script
  src="https://www.paypal.com/sdk/js?client-id=AeOHupeadvVpNrAaJzRL9OLj7fc8MqKK7ZT-N5PeQZ_xV2qMB6T12CPjiIk52lLqc66bwyzOdZpGyKD8&enable-funding=venmo&currency=USD"
  data-sdk-integration-source="button-factory">
</script>

<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199.99}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          const datos = new FormData();
          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

          fetch('finalizar-registro/pagar', {
            method: 'POST',
            body: datos
          })
          .then(respuesta => respuesta.json())
          .then(resultado => {
            if (resultado.resultado) {
              const url = window.location.href = '/finalizar-registro/conferencias';
              actions.redirect(url);
            }
          })
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container--1');

    // Pase Virtual
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":49.99}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          const datos = new FormData();
          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

          fetch('finalizar-registro/pagar', {
            method: 'POST',
            body: datos
          })
          .then(respuesta => respuesta.json())
          .then(resultado => {
            if (resultado.resultado) {
              const url = window.location.href = '/finalizar-registro/conferencias';
              actions.redirect(url);
            }
          })
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container--2');
  }

  initPayPalButton();
</script>
