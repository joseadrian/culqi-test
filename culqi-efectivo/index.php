<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Culqi Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  </head>
  <body>
    <div class="container">
      <h1>Culqi Tarjetas + Efectivo - PHP Example</h1>
      <a id="miBoton" class="btn btn-primary" href="#" >Pagar 7.00</a>
      <br/><br/><br/>
      <div class="panel panel-default" id="response-panel">
        <div class="panel-heading">Respuesta</div>
        <div class="panel-body" id="response">
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- <script src="waitMe.min.js"></script> -->

        <!--<script src="http://localhost:9000/js/v3"></script>-->

		<!--<script src="http://192.168.0.130:8082/lib/culqijs.js"></script>-->

		<script src="https://checkout.culqi.com/js/v3"></script>
		<!-- <script src="http://localhost:8000/js/v3"></script> -->
		<!-- <script src="/api/js.js"></script> -->
		<!-- <script src="/checkout.js"></script> -->

    <!-- <script type="text/javascript" src="js/app.js" ></script> -->
  </body>
</html>

<script>

	function resultdiv(message) {
        $('#response').html(message);
    }
    function resultpe(message) {
        $('#response').html(message);
    }

	$(document).ready(function() {
		Culqi = new culqijs.Checkout();
		Culqi.publicKey = 'pk_test_1SF2esUfI4u3XW4a';
		Culqi.options({
			lang: 'auto',
			modal: true,
            installments: false,
			style: {
				bgcolor: '#f0f0f0',
				maincolor: '#53D3CA',
				disabledcolor: '#ffffff',
				buttontext: '#ffffff',
				maintext: '#4A4A4A',
				desctext: '#4A4A4A',
				logo: 'https://image.flaticon.com/icons/svg/25/25231.svg'
      		  }
		})
		Culqi.settings({
			title: 'Github',
			currency: 'PEN',
			description: 'Polera Culqi',
			amount: 700
		});

		$('#miBoton').on('click', function (e) {
				Culqi.open();
				e.preventDefault();
		});


	});
	function culqi() {
			if (Culqi.token) {

				    console.log("Token obtenido");
            resultdiv('Token obtenido ' + JSON.stringify(Culqi.token));
			} else if (Culqi.order) {
				 alert("Order confirmada");
                 console.log(Culqi.order);
				 resultpe(Culqi.order);
			}
			else if (Culqi.closeEvent){
				console.log('Close event', Culqi.closeEvent);
			} else {
				$('#response-panel').show();
				$('#response').html(Culqi.error.merchant_message);
			}
		};
</script>