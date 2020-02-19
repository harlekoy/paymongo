<?php

namespace Harlekoy\Paymongo\OpenAPI;

class Source extends BaseAPI
{
    /**
     * Create a Source.
     *
     * @return [type] [description]
     */
    public function create()
    {
        return $this->request('POST', '/sources');
    }
}
