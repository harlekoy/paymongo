<?php

namespace Harlekoy\Paymongo\OpenAPI;

use Illuminate\Support\Arr;

/**
 * The token object represents a payment source, e.g. your customer's credit cards.
 * Tokenization is the process of collecting sensitive information such as card
 * details that allows you to process without having to handle such sensitive
 * information.
 *
 * To charge a credit card, you must first create a token for the card. Once a token
 * has been generated for the card, you may use it as a source to create a Payment
 * object and, in turn, charge the credit card.
 *
 * Tokens can only be used once. Once a token is used, whether or not the creation of
 * a Payment is successful, you must generate a new token to attempt a charge for the
 * same credit card.
 *
 * Right now, only cards can be tokenised. For testing purposes, you may (only) use
 * the following test credit cards for creating tokens:
 */
class Token extends BaseAPI
{
    /**
     * Retrieve a token given an ID. The prefix for the id is tok_
     * followed by a unique hash representing the token.
     *
     * @param  string $token
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function find($token)
    {
        return $this->request('GET', "/tokens/{$token}");
    }

    /**
     * Creates a one-time use token representing your
     * customer'scredit card details.
     *
     * @param  string $attributes
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function create($attributes)
    {
        return $this->request('POST', "/tokens", [
            'data' => [
                'attributes' => array_merge($attributes, [
                    'cvc' => (string) Arr::get($attributes, 'cvc'),
                ])
            ]
        ]);
    }

    /**
     * Get access key.
     *
     * @return string
     */
    public function accessKey()
    {
        return config('paymongo.public_key');
    }
}
