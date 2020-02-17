<?php

namespace Harlekoy\Paymongo;

class Paymongo
{
    /**
     * Get Image Classification Model.
     *
     * @return \Harlekoy\Nanonets\Classifications\Image
     */
    public function token()
    {
        return new Token;
    }

    /**
     * Get OCR Model.
     *
     * @return \Harlekoy\Nanonets\Classifications\OCR
     */
    public function payment()
    {
        return new Payment;
    }

    /**
     * Get Object Detection Model.
     *
     * @return \Harlekoy\Nanonets\Classifications\Object
     */
    public function source()
    {
        return new Source;
    }

    /**
     * Get Multi Label Classification Model.
     *
     * @return \Harlekoy\Nanonets\Classifications\MultiLabelImage
     */
    public function webhook()
    {
        return new Webhook;
    }
}
