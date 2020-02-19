<?php

namespace Harlekoy\Paymongo;

use Harlekoy\Paymongo\OpenAPI\Payment;
use Harlekoy\Paymongo\OpenAPI\Source;
use Harlekoy\Paymongo\OpenAPI\Token;
use Harlekoy\Paymongo\OpenAPI\Webhook;

class Paymongo
{
    /**
     * @var \Harlekoy\Paymongo\OpenAPI\Token
     */
    protected $token;

    /**
     * @var \Harlekoy\Paymongo\OpenAPI\Payment
     */
    protected $payment;

    /**
     * @var \Harlekoy\Paymongo\OpenAPI\Source
     */
    protected $source;

    /**
     * @var \Harlekoy\Paymongo\OpenAPI\Webhook
     */
    protected $webhook;

    /**
     * Paymongo constructor.
     */
    public function __construct()
    {
        $this->token = new Token;
        $this->payment = new Payment;
        $this->source = new Source;
        $this->webhook = new Webhook;
    }

    /**
     * Get token APIs.
     *
     * @return  \Harlekoy\Paymongo\OpenAPI\Token
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * Get payment APIs.
     *
     * @return  \Harlekoy\Paymongo\OpenAPI\Payment
     */
    public function payment()
    {
        return $this->payment;
    }

    /**
     * Get source APIs.
     *
     * @return  \Harlekoy\Paymongo\OpenAPI\Source
     */
    public function source()
    {
        return $this->source;
    }

    /**
     * Get webhook APIs.
     *
     * @return \Harlekoy\Paymongo\OpenAPI\Webhook
     */
    public function webhook()
    {
        return $this->webhook;
    }
}
