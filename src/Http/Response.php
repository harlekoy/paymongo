<?php

namespace Harlekoy\Paymongo\Http;

use Illuminate\Support\Arr;
use Illuminate\Support\Traits\ForwardsCalls;

class Response
{
    use ForwardsCalls;

    /**
     * @var \Harlekoy\Paymongo\OpenAPI\BaseAPI
     */
    protected $api;

    /**
     * @var array
     */
    protected $content;

    /**
     * Response constructor.
     *
     * @param  \Harlekoy\Paymongo\OpenAPI\BaseAPI $api
     * @param  array $content
     */
    public function __construct($api, $content)
    {
        $this->api = $api;
        $this->content = $content;
    }

    /**
     * Dynamically handle calls into the query instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->api, $method, array_merge(
            Arr::wrap($this->getKey()), $parameters
        ));
    }

    /**
     * Get response content.
     *
     * @param  mixed $key
     * @return array
     */
    public function getContent($key = null)
    {
        if ($key) {
            return Arr::get($this->content, $key);
        }

        return $this->content;
    }

    /**
     * Get data.
     *
     * @return array
     */
    public function getData($key)
    {
        return $this->getContent('data'.($key ? '.'.$key : ''));
    }

    /**
     * Get all of the current attributes on the model.
     *
     * @return array
     */
    public function getAttribute($key = null)
    {
        return $this->getData('attributes'.($key ? '.'.$key : ''));
    }

    /**
     * Get the primary key for the model.
     *
     * @return string
     */
    public function getKeyName()
    {
        return 'id';
    }

    /**
     * Get the response key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return $this->getData('type');
    }

    /**
     * Get the value of the response primary key.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->getData($this->getKeyName());
    }

    /**
     * Convert response to string.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->content);
    }
}
