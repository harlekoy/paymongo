<?php

namespace Harlekoy\Paymongo;

class Source extends BaseAPI
{
    public function create()
    {
        return $this->request('POST', '/sources');
    }
}
