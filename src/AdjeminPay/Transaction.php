<?php

namespace AdjeminPay;

use AdjeminPay\Exception\AdjeminPayBadRequest;

/**
 * Transaction Class
 * 
 * @version 1.0.0
 */
class Transaction
{
    /**
     * @var int $amount Amount
     */
    public $amount;

    /**
     * @var string $reference Reference
     */
    public $reference;

    /**
     * @var string $designation Designation
     */
    public $designation;

    /**
     * @var string $client_reference  Client Reference
     */
    public $client_reference;


    /**
     * @var string $transaction_type Transaction type
     */
    public $transaction_type;


    /**
     * @var string $currency_code  Currency code
     */
    public $currency_code;

    /**
     * @var string $status Status
     */
    public $status;

    /**
     * @var string $is_pending  IsPending
     */
    public $is_pending;

    /**
     * @var string $is_blocked  IsBlocked
     */
    public $is_blocked;

    /**
     * @var string $is_canceled  IsCanceled
     */
    public $is_canceled;

    /**
     * @var string $paid_at  PaidAt
     */
    public $paid_at;

    /**
     * @var string $canceled_at  CanceledAt
     */
    public $canceled_at;

    /**
     * @var string $is_successfull  IsSuccessfull
     */
    public $is_successfull;

    const STATUS = ['INITIATED','PENDING', 'EXPIRED', 'CANCELLED', 'SUCCESS', 'FAILED']; 

    /**
     * Class constructor
     */
    public function __construct(array $data = []){
        $this->amount =  $data['amount'];
        $this->reference = $data['reference'];
        $this->designation = $data['designation'];
        $this->client_reference = $data['client_reference'];
        $this->provider = $data['transaction_type'];
        $this->currency_code = $data['currency_code'];
        $this->status = $data['status'];
        $this->is_pending = $data['is_pending'];
        $this->is_blocked = $data['is_blocked'];
        $this->is_canceled = $data['is_canceled'];
        $this->is_successfull = $data['is_successfull'];
        $this->paid_at = $data['paid_at'];
        $this->canceled_at = $data['canceled_at'];
    }

    public function setStatus(string $status){
        if(in_array($status, self::STATUS)){
            $this->status = $status;
        }else{
            throw new AdjeminPayBadRequest("Bad status code", 400);
        }
    }
}
