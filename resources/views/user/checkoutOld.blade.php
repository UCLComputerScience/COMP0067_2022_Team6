@extends('layouts.mainlayout-logged-in')

@section('content')
<?php
//require ('vendor/autoload.php');
 \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));

  $checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => 'http://127.0.0.1:8000/success',
      'cancel_url' => 'http://127.0.0.1:8000/cancel',
      'payment_method_types' => ['card'],
      'mode' => 'subscription',
      'line_items' => [[
        'price' => "price_1Ka7hTLbAUO2h0p7oxGVMlab",
        'quantity' => 1,
      ]],
    ]);

?>
<head>
  <title>Stripe Subscription Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <script type="text/javascript">
     var stripe = Stripe(getenv('STRIPE_KEY'));
     var session = "<?php echo $checkout_session['id']; ?>";
          stripe.redirectToCheckout({ sessionId: session })
                  .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });          
  </script>
  
</body>
@endsection