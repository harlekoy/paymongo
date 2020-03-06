<?php

return [
    'livemode' => env('PAYMONGO_LIVEMODE', false),

    /**
     * Public keys are meant to be used for any requests coming from the frontend, such as generating tokens or sources,
     * either using Javascript or through the mobile SDKs.
     * Public keys cannot be used to trigger payments or modify any part of the transaction flow.
     * They have the prefix pk_live_ for live mode and pk_test_ for test mode.
     */
    'public_key'    => env('PAYMONGO_KEY'),

    /**
     * Secret keys, on the other hand, are for triggering or modifying payments. Never share your secret keys anywhere
     * that is publicly accessible: Github, client-side Javascript code, your website or even chat rooms.
     * The prefixes for the secret keys are sk_live_ for live mode and sk_test_ for test mode.
     */
    'secret_key' => env('PAYMONGO_SECRET'),

    /*
     * This class is responsible for calculating the signature that will be added to
     * the headers of the webhook request. A webhook client can use the signature
     * to verify the request hasn't been tampered with.
     */
    'signer' => \Harlekoy\Paymongo\Signer\DefaultSigner::class,

    'webhook_signature' => env('PAYMONGO_WEBHOOK_SIG', 'whsk_35UDwwNbFFpCaGrrernoM8A3'),

    /*
     * This is the name of the header where the signature will be added.
     */
    'signature_header_name' => env('PAYMONGO_SIG_HEADER', 'Paymongo-Signature'),
];
