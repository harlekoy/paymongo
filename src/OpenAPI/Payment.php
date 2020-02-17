<?php

namespace Harlekoy\Paymongo;

class Payment extends BaseAPI
{
    /**
     * You can create a new model using this endpoint.
     * A successful API call will return the json
     * structure of the newly created model.
     *
     * You can then use the model's id to upload images
     * for each category and then retrain the model.
     *
     * @return [type] [description]
     */
    public function create()
    {
        return $this->request('POST', '/payments');
    }

    public function get()
    {
        return $this->request('GET', "/payments");
    }

    public function retrieve()
    {
        return $this->request('POST', "/payments/{$payment}");
    }
}
