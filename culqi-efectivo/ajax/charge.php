<?php
/**
 * Crear un charge a una tarjeta usando Culqi PHP.
 */

try {
  // Cargamos Requests y Culqi PHP
  include_once dirname(__FILE__).'/../libraries/Requests/library/Requests.php';
  Requests::register_autoloader();
  include_once dirname(__FILE__).'/../libraries/culqi-php/lib/culqi.php';



$SECRET_KEY = "sk_test_RG3NsqveWz4BlDjc";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
        "amount" => 700,
        "installments" => $_POST['cuotas'],
        "currency_code" => "PEN",
        "email" => "liz.ruelas.borda@gmail.com",
        "source_id" => $_POST['token']
      )
  );
  // Respuesta
  echo json_encode($charge);

} catch (Exception $e) { 
  
  error_log($e->getMessage()); 

  echo $e->getMessage(); 


}
