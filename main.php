<?php

//copy credrential from adjeminpay.com
$sdk = new SDK('91244f3a-617c-4026-b0f1-ad3711ef4f43','un6LeSil4NktKkjaYpjn4drpfb2YLMQPwJctX3uK');

//get return url
echo $sdk->getReturnUrl();

//get notify url
echo $sdk->getNotifyUrl();

//get cancel url
echo $sdk->getCancelUrl();

//get transaction by reference
var_dump($sdk->getTransanctionByReference("ADJEMIN_ORDER_016953_008190"));

//Get amount
echo $sdk->getAmount();

//Get items
echo $sdk->getItems();

//Get reference
echo $sdk->getReference();

//Get designation
echo $sdk->getDesignation();

echo $sdk->getClientReference();

//Get Transaction type
echo $sdk->getTransactionType();

//Get currency code
echo $sdk->getCurrencyCode();

//Get Status
echo $sdk->getStatus();

//IS_PENDING
echo $sdk->isPending();

//IS_BLOCKED
echo $sdk->isBlocked();

//IS_CANCELED
echo $sdk->isCanceled();

//IS_APPROUVED
echo $sdk->isApprouved();

//IS_PAID
echo $sdk->isPaid();

//PAID_AT
echo $sdk->getAmount();