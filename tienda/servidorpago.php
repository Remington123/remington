<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../culqui/vendor/autoload.php';
  require '../culqui/lib/culqi.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_1VyJsk7YT0eKiqq7";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
        "amount" => (float)$_POST["monto"]*100,
        "capture" => true,
        "currency_code" => "PEN",
        "description" => "Venta de prueba",
        "installments" => 0,
        "email" => $_POST["email"],
        "metadata" => array("test"=>"test"),
        "source_id" => $_POST["token"]
      )
  );
  // Respuesta
  echo json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
