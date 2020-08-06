<?php

use AdjeminPay\AdjeminPay;
use AdjeminPay\Transaction;
use AdjeminPay\Exception\AdjeminPayBadRequest;

// previous transaction $my_transaction
/** @var Transaction $my_transaction Transaction */

$application = 'VOTRE_APPLICATION_ID';
$secret = 'VOTRE_CLIENT_SECRET';
$reference = $my_transaction->reference;

try {
    //Initialisation de AdjeminPay
    $adjeminPay = new AdjeminPay($application, $secret);

    //recupérer une transaction depuis AdjeminPay
    /** @var Transaction $transaction Transaction */
    $transaction = $adjeminPay->getTransanctionByReference($reference);

    // Verification de l'etat du traitement de la commande
    if($transaction->is_successfull){
        echo 'Bravo, votre paiement a été effectué avec succès';
        $my_transaction->setStatus($transaction->status);
        die();
    }

    // Verification du montant de la transaction
    try {
        if($transaction->amount == $my_transaction->amount ){
            if (in_array($transaction->status, ['CANCELLED', 'EXPIRED', 'FAILED'])){
                echo "La transaction n'as pas pu se dérouler comme prévue";
            }else{
                $my_transaction->setStatus($transaction->status);
            }
        }else{
            throw new AdjeminPayBadRequest("Tentative de fraude", 500);
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

} catch (\Exception $ex) {
    echo $ex->getMessage;
    //Accès direct
}