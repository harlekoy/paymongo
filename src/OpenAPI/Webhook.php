<?php

namespace Harlekoy\Paymongo\OpenAPI;

class Webhook extends BaseAPI
{
    /**
     * Create a Webhook.
     *
     * @return [type] [description]
     */
    public function create($attributes)
    {
        return $this->request('POST', '/webhooks', [
            'data' => compact('attributes'),
        ]);
    }

    /**
     * List all webhooks.
     *
     * Returns all the webhooks you previously created,
     * with the most recent webhooks returned first.
     *
     * @return [type] [description]
     */
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
