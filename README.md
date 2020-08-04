# ADJEMINPAY PHP SDK


## Using case
```php
<?php

use AdjeminPay\AdjeminPay;

//copy credrential from adjeminpay.com
$sdk = new AdjeminPay('91244f3a-617c-4026-b0f1-ad3711ef4f43','un6LeSil4NktKkjaYpjn4drpfb2YLMQPwJctX3uK');


//get return url
echo $sdk->getReturnUrl();
//or 
echo $sdk->data['return_url'];



//get notify url
echo $sdk->getNotifyUrl();
// or 
echo $sdk->data['notify_url'];



//get cancel url
echo $sdk->getCancelUrl();
//or
echo $sdk->data['cancel_url'];



//get transaction by reference

$response = $sdk->getTransanctionByReference("ADJEMIN_ORDER_016953_008190");
var_dump($response);



//Get amount
echo $sdk->getAmount();
//or
echo $response['amount'];



//Get items
echo $sdk->getItems();
//or
echo $response['items'];



//Get reference
echo $sdk->getReference();
//or
echo $response['reference'];



//Get designation
echo $sdk->getDesignation();
//or
echo $response['designation'];



//get client reference
echo $sdk->getClientReference();
//or
echo $response['client_reference'];



//Get Transaction type
echo $sdk->getTransactionType();
//or
echo $response['transaction_type'];



//Get currency code
echo $sdk->getCurrencyCode();
//or
echo $response['currency_code'];



//Get Status
echo $sdk->getStatus();
//or
echo $response['status'];



//IS_PENDING
echo $sdk->isPending();
//or
echo $response['isPending'];



//IS_BLOCKED
echo $sdk->isBlocked();
//or
echo $response['is_blocked'];



//IS_CANCELED
echo $sdk->isCanceled();
//or
echo $response['is_canceled'];




//IS_PAID
echo $sdk->isSuccessfull();
//or
$response['is_successfull'];



//PAID_AT
echo $sdk->paidAt();
//or
$response['paid_at'];



//CANCELED_AT
echo $sdk->canceledAt();
//or
$response['canceled_at'];



//CANCELED_AT
echo $sdk->paidAt();
//or
$response['paid_at'];

```