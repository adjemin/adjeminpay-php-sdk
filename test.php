<?php

use AdjeminPay\AdjeminPay;
use AdjeminPay\Transaction;

//Create AdjeminPay instance
$clientId = -1; //Client ID of an application created on  Merchant backoffice
$clientSecret  = "Y4R91969G3GYKV1JKvKQaaliK95yluEWKbHKPrfj"; //Client Secret of an application created on  Merchant backoffice
$adjeminPay = new AdjeminPay($clientId, $clientSecret);

//get transaction by reference
/** @var Transaction $transaction Transaction*/
$transaction = $adjeminPay->getTransanctionByReference("ADJEMIN_ORDER_016953_008190");
var_dump($transaction);



//Get amount
echo $adjeminPay->getAmount();
//or
echo $transaction->amount;



//Get reference
echo $adjeminPay->getReference();
//or
echo $transaction->reference;



//Get designation
echo $adjeminPay->getDesignation();
//or
echo $transaction->designation;



//get client reference
echo $adjeminPay->getClientReference();
//or
echo $transaction->client_reference;



//Get Transaction type
echo $adjeminPay->getProvider();
//or
echo $transaction->provider;



//Get currency code
echo $adjeminPay->getCurrencyCode();
//or
echo $transaction->currency_code;



//Get Status
echo $adjeminPay->getStatus();
//or
echo $transaction->status;



//IS_PENDING
echo $adjeminPay->isPending();
//or
echo $transaction->is_pending;



//IS_BLOCKED
echo $adjeminPay->isBlocked();
//or
echo $transaction->is_blocked;



//IS_CANCELED
echo $adjeminPay->isCanceled();
//or
echo $transaction->is_canceled;




//IS_PAID
echo $adjeminPay->isSuccessfull();
//or
$transaction->is_successfull;



//PAID_AT

$transaction->paid_at;



//CANCELED_AT
echo $adjeminPay->canceledAt();
//or
$transaction->canceled_at;
