# AdjeminPay PHP SDK

[![Latest Stable Version](https://poser.pugx.org/adjeminpay/adjeminpay-php-sdk/v)](//packagist.org/packages/adjeminpay/adjeminpay-php-sdk) [![Total Downloads](https://poser.pugx.org/adjeminpay/adjeminpay-php-sdk/downloads)](//packagist.org/packages/adjeminpay/adjeminpay-php-sdk) [![Latest Unstable Version](https://poser.pugx.org/adjeminpay/adjeminpay-php-sdk/v/unstable)](//packagist.org/packages/adjeminpay/adjeminpay-php-sdk) [![License](https://poser.pugx.org/adjeminpay/adjeminpay-php-sdk/license)](//packagist.org/packages/adjeminpay/adjeminpay-php-sdk)

The AdjeminPay PHP SDK provides convenient access to the AdjeminPay API from
applications written in the PHP language. It includes a pre-defined set of
classes for API resources that initialize themselves dynamically from API
responses which makes it compatible with a wide range of versions of the AdjeminPay API

## Requirements

PHP 5.6.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require adjeminpay/adjeminpay-php-sdk
```

## Use case
```php
<?php

use AdjeminPay\AdjeminPay;
use AdjeminPay\Transaction;

//Create AdjeminPay instance
$clientId = "CLIENT_ID"; //Client ID of an application created on  Merchant backoffice
$clientSecret  = "CLIENT_SECRET"; //Client Secret of an application created on  Merchant backoffice
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

var_dump($transaction);

//Get Transaction Status by merchant_transaction_id
/** @var Transaction $transaction Transaction*/
$merchant_transaction_id = 'b72e51dc-7211-4e85-a937-5372c8769d36';
$transaction = $adjeminPay->getTransactionStatus($merchant_transaction_id);

var_dump($transaction);


```
