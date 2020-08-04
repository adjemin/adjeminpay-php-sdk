# AdjeminPay PHP SDK


## Using case
```php
<?php

use AdjeminPay\AdjeminPay;
use AdjeminPay\Transaction;

//copy credrential from adjeminpay.com
$adjeminPay = new AdjeminPay('91244f3a-617c-4026-b0f1-ad3711ef4f43', 'un6LeSil4NktKkjaYpjn4drpfb2YLMQPwJctX3uK');



//get transaction by reference
/** @var Transaction $transaction Transaction*/
$transaction = new $adjeminPay->getTransanctionByReference("ADJEMIN_ORDER_016953_008190");
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
echo $adjeminPay->getTransactionType();
//or
echo $transaction->transaction_type;



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
echo $adjeminPay->paidAt();
//or
$transaction->paid_at;



//CANCELED_AT
echo $adjeminPay->canceledAt();
//or
$transaction->canceled_at;

```