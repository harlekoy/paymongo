<?php

namespace Harlekoy\Paymongo\OpenAPI;

class Webhook extends BaseAPI
{
    /**
     * Create a Webhook.
     *
     * @param array $attribute
     * @return \Harlekoy\Paymongo\Http\Response
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
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function get()
    {
        return $this->request('GET', '/webhooks');
    }

    /**
     * Retrieve specific webhook.
     *
     * @param  string $id
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function find($id)
    {
        return $this->request('GET', "/webhooks/{$id}");
    }

    /**
     * Enable a Webhook.
     *
     * @param  string $id
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function enable($id)
    {
        return $this->request('POST', "/webhooks/{$id}/enable");
    }

    /**
     * Disable a Webhook.
     *
     * @param string $id
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function disable($id)
    {
        return $this->request('POST', "/webhooks/{$id}/disable");
    }

    /**
     * Update a Webhook.
     *
     * @param string $id
     * @param array $attributes
     *
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function update($id, $attributes)
    {
        return $this->request('PUT', "/webhooks/{$id}", [
            'data' => compact('attributes'),
        ]);
    }
}
