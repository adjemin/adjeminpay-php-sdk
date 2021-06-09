<?php

use AdjeminPay\AdjeminPay;
use AdjeminPay\Transaction;

try {

//Create AdjeminPay instance
    $clientId = -1; //Client ID of an application created on  Merchant backoffice
    $clientSecret  = "Y4R91969G3GYKV1JKvKQaaliK95yluEWKbHKPrfj"; //Client Secret of an application created on  Merchant backoffice
    $adjeminPay = new AdjeminPay($clientId, $clientSecret);

//Make Payment transaction
    /** @var Transaction $transaction Transaction*/
    $transaction = $adjeminPay->createTransaction([
        'merchant_transaction_id' => 'b72e51dc-7211-4e85-a937-5372c8769d36', //required You create a merchant_transaction_id
        'designation' => 'Test', //required
        'currency_code' => 'XOF', //required
        'buyer_name' => 'Ange Bagui', //required
        'notification_url' => 'https://adjemin.com', //required
        'payment_method_reference' => 'MTN_CI', //required //Enum = ["MTN_CI", "ORANGE_CI"]
        'buyer_reference' => '2250556888385', //required
        'amount' => '10', //required
        'otp' => '' //used when payment_method_reference is ORANGE_CI
    ]);

    // Verification de l'etat du traitement de la commande
    if($transaction->status == Transaction::SUCCESSFUL){
        echo 'Bravo, votre paiement a été effectué avec succès';
        die();
    }

    //Get Transaction Status by merchant_transaction_id
    /** @var Transaction $transaction Transaction*/
    $transaction = $adjeminPay->getTransactionStatus('b72e51dc-7211-4e85-a937-5372c8769d36');
    // Verification de l'etat du traitement de la commande
    if($transaction->status == Transaction::SUCCESSFUL){
        echo 'Bravo, votre paiement a été effectué avec succès';
        die();
    }


} catch (\Exception $ex) {
    echo $ex->getMessage();
    //Accès direct
}