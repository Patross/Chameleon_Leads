<?php
    require_once("includes/header.php");


    require_once("vendor/braintree/braintree_php/lib/Braintree.php");
    $result = $gateway->paymentMethodNonce()->create();
$nonce = $result->paymentMethodNonce->nonce;
    $gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '973ztmw37rbwf78w',
    'publicKey' => '5d7s4qmhhwr95jb8',
    'privateKey' => '6b72568f8f05315d93ae61e8c2cd87fa'
    ]);

    $clientToken = $gateway->clientToken()->generate();
//     $nonceFromTheClient = $_POST["payment_method_nonce"];

//     $result = $gateway->transaction()->sale([
//         'amount' => '10.00',
//         'paymentMethodNonce' => "fake-valid-nonce",
//         'options' => [
//             'submitForSettlement' => True
//         ]
//     ]);
?>
<main>
<!-- Load PayPal's checkout.js Library. -->
<script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

<!-- Load the client component. -->
<script src="https://js.braintreegateway.com/web/3.39.0/js/client.min.js"></script>

<!-- Load the PayPal Checkout component. -->
<script src="https://js.braintreegateway.com/web/3.39.0/js/paypal-checkout.min.js"></script>


<div id="paypal-button"></div>


<script>
// Create a client.
braintree.client.create({
  authorization: <?php echo $gateway->clientToken()->generate(); ?>
}, function (clientErr, clientInstance) {

  // Stop if there was a problem creating the client.
  // This could happen if there is a network error or if the authorization
  // is invalid.
  if (clientErr) {
    console.error('Error creating client:', clientErr);
    return;
  }

  // Create a PayPal Checkout component.
  braintree.paypalCheckout.create({
    client: clientInstance
  }, function (paypalCheckoutErr, paypalCheckoutInstance) {

    // Stop if there was a problem creating PayPal Checkout.
    // This could happen if there was a network error or if it's incorrectly
    // configured.
    if (paypalCheckoutErr) {
      console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
      return;
    }

    // Set up PayPal with the checkout.js library
    paypal.Button.render({
      env: 'sandbox', // or 'production'

      payment: function () {
        return paypalCheckoutInstance.createPayment({
          // Your PayPal options here. For available options, see
          // http://braintree.github.io/braintree-web/current/PayPalCheckout.html#createPayment
        });
      },

      onAuthorize: function (data, actions) {
        return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
          // Submit `payload.nonce` to your server.
        });
      },

      onCancel: function (data) {
        console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
      },

      onError: function (err) {
        console.error('checkout.js error', err);
      }
    }, '#paypal-button').then(function () {
      // The PayPal button will be rendered in an html element with the id
      // `paypal-button`. This function will be called when the PayPal button
      // is set up and ready to be used.
    });

  });

});
</script>


  <!--<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
  <div id="dropin-container"></div>
  <button id="submit-button">Request payment method</button>
  <script>
    var button = document.querySelector('#submit-button');
    var clientToken = "<?php echo($clientToken); ?>";
    braintree.dropin.create({
      authorization: clientToken,
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          // Submit payload.nonce to your server
          console.log(payload.nonce);
        });
      });
    });-->
  </script>
</main>
<?php
    require_once("includes/footer.php")
?>