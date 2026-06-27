<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Contact Form Notification Recipients
    |--------------------------------------------------------------------------
    |
    | Email addresses that receive a notification whenever the public contact
    | form is submitted. Override via the CONTACT_RECIPIENTS env value as a
    | comma-separated list.
    |
    */

    'recipients' => array_values(array_filter(array_map(
        'trim',
        explode(',', env(
            'CONTACT_RECIPIENTS',
            'balajinagaraj9876@gmail.com,nanthini7596@gmail.com,selvasandy2930@gmail.com'
        ))
    ))),

];
