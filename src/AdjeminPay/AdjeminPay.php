<?php

namespace AdjeminPay;

use AdjeminPay\Exception\AdjeminPayAuthException;
use GuzzleHttp\Client;
use AdjeminPay\Exception\AdjeminPayException;

/**
 * AdjeminPay Class
 * 
 * @version 1.0.0
 */
class AdjeminPay implements AdjeminPayInterface {

     const API_BASE_URL = "https://api.adjeminpay.net";

     /**
     * @var string $clientId Client ID
     */
    private $clientId;

    /**
     * @var string $clientSecret Client Secret
     */
    private $clientSecret;

    /**
     * @var array $data All information about the application or transaction
     */
    public $data;
    
    /**
     * @var string $token Access token
     */
    private $token;

    /**
     * @var array $response Transaction reponse data
     */
    private $response;


    /**
     * Class constructor
     * Initialize some private value and check if they are available
     *
     * @param string $clientId
     * @param string $clientSecret
     * @throws AdjeminPayAuthException
     */
    public function __construct($clientId, $clientSecret){
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->token = $this->obtainAccessToken();
    }

    public function getBaseUrl()
    {
        return self::API_BASE_URL;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }


    /**
     * Obtain Access Token
     * @throws AdjeminPayAuthException
     */
    public function obtainAccessToken(){
        $client = new Client();
        $url = $this->getBaseUrl()."/oauth/token";
        $body = [
            'client_id' => ''.$this->getClientId(),
            'client_secret'=> ''.$this->getClientSecret(),
            'grant_type' => 'client_credentials'
        ];

        $response = $client->post($url, [
            "headers" => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            "form_params" => $body

        ]);

        if ($response->getStatusCode() == 200){
            $body = $response->getBody()->getContents();
            $json = (array) json_decode($body, true);

            if(array_key_exists('access_token', $json) && !empty( $json['access_token'])){
                return $json['access_token'];
            }else{
                if(array_key_exists('message', $json) && !empty( $json['message'])){
                    $message  = $json['message'];
                }else{
                    $message  = "Client authentication failed";
                }
                throw  new AdjeminPayAuthException($message,$response->getStatusCode());
            }

        }else{
            $body = $response->getBody()->getContents();
            $json = (array) json_decode($body, true);
            if(array_key_exists('message', $json) && !empty( $json['message'])){
                $message  = $json['message'];
            }else{
                $message  = "Client authentication failed";
            }
            throw  new AdjeminPayAuthException($message,$response->getStatusCode());
        }
    }

    public function getAccessToken()
    {
        return $this->token;
    }

    /**
     * @throws AdjeminPayException
     * @throws AdjeminPayAuthException
     */
    public function createTransaction($params)
    {
        if(empty($this->getAccessToken())){
            $message = 'The requested service needs credentials, but the ones provided were invalid.';
            throw  new AdjeminPayAuthException($message,401);
        }

        $client = new Client();
        $url = $this->getBaseUrl()."/v2/transactions";
        $body = [
            'merchant_transaction_id' => $params['merchant_transaction_id'],
            'designation' => $params['designation'],
            'buyer_name' => $params['buyer_name'],
            'buyer_reference' => $params['buyer_reference'],
            'notification_url' => $params['notification_url'],
            'payment_method_reference' => $params['payment_method_reference'],
            'amount' => intval($params['amount']),
            'currency_code' => $params['currency_code'],
            'otp' => array_key_exists('otp', $params)?$params['otp']:'',
        ];

        $response = $client->post($url, [
            "headers" => [
                'Authorization' => 'Bearer '.$this->getAccessToken(),
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            "form_params" => $body

        ]);

        $body = $response->getBody()->getContents();
        if($response->getStatusCode() == 200){
            $json = json_decode($body, true);

            if(array_key_exists('data', $json) && !empty( $json['data'])){
                $data = $json['data'];
                return new Transaction($data);
            }else{
                $json =  json_decode($body, true);
                if(array_key_exists('message', $json) && !empty( $json['message'])){
                    $message  = $json['message'];
                }else{
                    $message  = "Payment has failed";
                }
                throw  new AdjeminPayException($message,$response->getStatusCode());
            }

        }else{

            $json =  json_decode($body, true);
            if(array_key_exists('message', $json) && !empty( $json['message'])){
                $message  = $json['message'];
            }else{
                $message  = "Payment has failed";
            }
            throw  new AdjeminPayException($message,$response->getStatusCode());
        }


    }

    public function getTransactionStatus($merchantTransactionId)
    {
        if(empty($this->getAccessToken())){
            $message = 'The requested service needs credentials, but the ones provided were invalid.';
            throw  new AdjeminPayAuthException($message,401);
        }

        $client = new Client();
        $url = $this->getBaseUrl()."/v2/transactions/$merchantTransactionId";

        $response = $client->get($url, [
            "headers" => [
                'Authorization' => 'Bearer '.$this->getAccessToken(),
                'Accept' => 'application/json'
            ],
        ]);

        $body = $response->getBody()->getContents();

        if($response->getStatusCode() == 200){
            $json = json_decode($body, true);

            if(array_key_exists('data', $json) && !empty( $json['data'])){
                $data = $json['data'];
                return new Transaction($data);
            }else{
                $json =  json_decode($body, true);
                if(array_key_exists('message', $json) && !empty( $json['message'])){
                    $message  = $json['message'];
                }else{
                    $message  = "Payment has failed";
                }
                throw  new AdjeminPayException($message,$response->getStatusCode());
            }

        }else{

            $json =  json_decode($body, true);
            if(array_key_exists('message', $json) && !empty( $json['message'])){
                $message  = $json['message'];
            }else{
                $message  = "Payment has failed";
            }
            throw  new AdjeminPayException($message,$response->getStatusCode());
        }
    }
}