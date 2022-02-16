<?php
namespace ArsalanAzhar\RingCentralWebhook\Exceptions;

use Exception;

class RingCentralWebhookNotFound extends RingCentralException
{
    public $response;

    public function __construct($response, $message = null, $code = 404)
    {
        $message = $message ?? $response->message;
        $this->response = $response;
        parent::__construct($response, $response->message, $code);
    }
}
