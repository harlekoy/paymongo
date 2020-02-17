<?php

namespace Harlekoy\Paymongo;

class Webhook extends BaseAPI
{
    public function create()
    {
        return $this->request('POST', '/webhooks');
    }

    public function get()
    {
        return $this->request('GET', '/webhooks');
    }

    public function enable()
    {
        return $this->request('POST', "/webhooks/{$webhook}/enable");
    }

    /**
     * Disable a Webhook.
     *
     * @return [type] [description]
     */
    public function disable()
    {
        return $this->request('POST', "/webhooks/{$webhook}/disable");
    }

    /**
     * Update a Webhook.
     *
     * @return [type] [description]
     */
    public function update()
    {
        return $this->request('PUT', "/webhooks");
    }
}
