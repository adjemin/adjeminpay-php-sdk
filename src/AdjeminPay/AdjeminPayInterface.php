<?php


namespace AdjeminPay;


interface AdjeminPayInterface
{
    public function getBaseUrl();
    public function getClientId();
    public function getClientSecret();
    public function obtainAccessToken();
    public function getAccessToken();
    public function  createTransaction($params);
    public function  getTransactionStatus($merchantTransactionId);

}