<?php

namespace Harlekoy\Paymongo\OpenAPI;

/**
 * A payment represents a payment transaction that is charged to a specific payment source.
 * Sources can be any of the supported payment methods. For this version of the API, we
 * only support cards issued by Visa or Mastercard.
 *
 * You can retrieve and list all payments. Payments are identified by a unique, random ID.
 */
class Payment extends BaseAPI
{
    /**
     * Creates a Payment you can attach a Token or Source to
     *
     * @return [type] [description]
     */
    public function create($attributes)
    {
        return $this->request('POST', '/payments', [
            'data' => [
                'attributes' => array_merge([
                    'currency' => 'PHP',
                ], $attributes)
            ],
        ]);
    }

    /**
     * List all payments.
     *
     * Returns all the payments you previously created, with
     * the most recent payments returned first
     *
     * @return [type] [description]
     */
    public function get()
    {
        return $this->request('GET', "/payments");
    }

    /**
     * Retrieve a payment.
     *
     * You can retrieve a Payment by providing a payment ID.
     * The prefix for the id is pay_ followed by a unique
     * hash representing the payment.
     *
     * @return [type] [description]
     */
    public function retrieve()
    {
        return $this->request('POST', "/payments/{$payment}");
    }
}
