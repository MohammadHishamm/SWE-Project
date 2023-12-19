<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "pk_test_51NDnX0IM9uJqn7pbZBOxFIFbTowWN2zKKNJN1VFmRG7zX3eBxDaO20p72YZa8a6uARETbYP74byk0Lg0eayOo5ga00vYoaGHIb",
        "publishableKey" => "sk_test_51NDnX0IM9uJqn7pbilZ45xIT5eUVlcGo7CicfcD1z03s4J6WJo2A6aQbD7DGljVXeqNxSK3g9h8fRWKoF24g8zkt00wzT9E7S0"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>
<?php

    $token = $_POST["stripeToken"];
    $contact_name = $_POST["c_name"];
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = $_POST["phone"];
    $email           = $_POST["stripeEmail"];
    $address         = $_POST["address"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["product_name"];
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'inr',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      header("Location:success.php?amount=$amount");
    }
?>