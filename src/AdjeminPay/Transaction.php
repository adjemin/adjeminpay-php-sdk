<?php

namespace AdjeminPay;

/**
 * Transaction Class
 * 
 * @version 1.0.0
 */
class Transaction
{
    /**
     * @var float $amount Amount
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
     * @var string $type Transaction type
     */
    public $type;


    /**
     * @var string $currency_code  Currency code
     */
    public $currency_code;

    /**
     * @var string $status Status
     */
    public $status;

    /**
     * @var string $payment_method_code
     */
    public $payment_method_code;

    /**
     * @var int $payment_method_id
     */
    public $payment_method_id;

    /**
     * @var boolean $is_waiting
     */
    public $is_waiting;

    /**
     * @var boolean $is_canceled
     */
    public $is_canceled;

    /**
     * @var string $canceled_at  CanceledAt
     */
    public $canceled_at;

    /**
     * @var boolean $is_approuved
     */
    public $is_approuved;

    /**
     * @var string $approuved_at
     */
    public $approuved_at;

    /**
     * @var string $reason
     */
    public $reason;

    /**
     * @var string $notif_url
     */
    public $notif_url;

    /**
     * @var string $buyer_reference
     */
    public $buyer_reference;

    /**
     * @var string $buyer_name
     */
    public $buyer_name;

    /**
     * @var string $phone_number
     */
    public $phone_number;

    /**
     * @var boolean $is_initiated
     */
    public $is_initiated;

    //STATUS
    const INITIATED = "INITIATED";
    //const WAITING_FOR_PAYMENT = "WAITING_FOR_PAYMENT";
    const SUCCESSFUL = "SUCCESSFUL";
    const PENDING = "PENDING";
    const FAILED = "FAILED";
    const EXPIRED = "EXPIRED";
    const CANCELLED = "CANCELLED";

    const ORANGE_SUCCESS = "SUCCESS"; //Orange give success for successful transaction

    public $fillable = [
        'merchant_id',
        'user_id',
        'application_id',
        'currency_code',
        'amount',
        'type',
        'payment_method_id',
        'is_waiting',
        'is_canceled',
        'card_provider_id',
        'is_approuved',
        'canceled_at',
        'approuved_at',
        'status',
        'reference',
        'designation',
        'client_reference',
        'reason',
        'notif_url',
        'error_meta_data',
        'buyer_reference',
        'provider_payment_id',
        'buyer_name',
        'payment_method_code',
        'phone_number',
        'is_initiated'
    ];

    /**
     * Class constructor
     */
    public function __construct(array $data = []){
        $this->amount = array_key_exists('amount', $data)?$data['amount']:null;
        $this->reference = array_key_exists('reference', $data)?$data['reference']:null;
        $this->designation =  array_key_exists('designation', $data)?$data['designation']:null;
        $this->client_reference = array_key_exists('client_reference', $data)?$data['client_reference']:null;
        $this->type = array_key_exists('type', $data)?$data['type']:null;
        $this->currency_code = array_key_exists('currency_code', $data)?$data['currency_code']:null;
        $this->status = array_key_exists('status', $data)?$data['status']:null;
        $this->is_waiting = array_key_exists('is_waiting', $data)? boolval($data['is_waiting']):null;
        $this->reason = array_key_exists('reason', $data)?$data['reason']:null;
        $this->notif_url = array_key_exists('notif_url', $data)?$data['notif_url']:null;
        $this->is_canceled = array_key_exists('is_canceled', $data)?boolval($data['is_canceled']):null;
        $this->is_initiated = array_key_exists('is_initiated', $data)?boolval($data['is_initiated']):null;
        $this->is_approuved = array_key_exists('is_approuved', $data)?boolval($data['is_approuved']):null;
        $this->approuved_at = array_key_exists('approuved_at', $data)?$data['approuved_at']:null;
        $this->canceled_at = array_key_exists('canceled_at', $data)?$data['canceled_at']:null;
        $this->payment_method_id = array_key_exists('payment_method_id', $data)?$data['payment_method_id']:null;
        $this->payment_method_code = array_key_exists('payment_method_code', $data)?$data['payment_method_code']:null;
        $this->buyer_reference = array_key_exists('buyer_reference', $data)?$data['buyer_reference']:null;
        $this->buyer_name = array_key_exists('buyer_name', $data)?$data['buyer_name']:null;
        $this->phone_number = array_key_exists('phone_number', $data)?$data['phone_number']:null;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @return string
     */
    public function getClientReference()
    {
        return $this->client_reference;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPaymentMethodCode()
    {
        return $this->payment_method_code;
    }

    /**
     * @return int
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    /**
     * @return bool
     */
    public function isWaiting()
    {
        return $this->is_waiting;
    }

    /**
     * @return bool
     */
    public function isCanceled()
    {
        return $this->is_canceled;
    }

    /**
     * @return string
     */
    public function getCanceledAt()
    {
        return $this->canceled_at;
    }

    /**
     * @return bool
     */
    public function isApprouved()
    {
        return $this->is_approuved;
    }

    /**
     * @return string
     */
    public function getApprouvedAt()
    {
        return $this->approuved_at;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getNotifUrl()
    {
        return $this->notif_url;
    }

    /**
     * @return string
     */
    public function getBuyerReference()
    {
        return $this->buyer_reference;
    }

    /**
     * @return string
     */
    public function getBuyerName()
    {
        return $this->buyer_name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @return bool
     */
    public function isInitiated()
    {
        return $this->is_initiated;
    }




}
