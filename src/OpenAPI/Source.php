<?php

namespace Harlekoy\Paymongo\OpenAPI;

class Source extends BaseAPI
{
    /**
     * Create a Source.
     *
     * @param  array $attributes
     * @return \Harlekoy\Paymongo\Http\Response
     */
    public function create($attributes)
    {
        return $this->request('POST', '/sources', [
            'data' => [
                'attributes' => $this->payload(array_merge([
                    'currency' => 'PHP',
                ], $attributes))
            ],
        ]);
    }
}
