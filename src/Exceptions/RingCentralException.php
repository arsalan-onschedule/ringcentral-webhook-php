<?php

namespace ArsalanAzhar\RingCentralWebhook\Exceptions;

use Exception;

class RingCentralException extends Exception
{
    public $response =null;


    public function __construct($response, $message = null, $code = 400)
    {
        $message = $message ?? $response->message;
        $this->response = $response;
        parent::__construct($response->message, $code);
    }

    public function getResponse()
    {
        return $this->response;
    }
}
