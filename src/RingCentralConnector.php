<?php

namespace ArsalanAzhar\RingCentralWebhook;

use ArsalanAzhar\RingCentralWebhook\Exceptions\RingCentralException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class  RingCentralConnector
{

    protected $webhookUrl;
    protected $client;

    public function __construct($webhookUrl = "")
    {
        $this->webhookUrl = $webhookUrl;
        $this->client = new Client();
    }


    public function setWebhookUrl($webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    public function getWebhookUrl()
    {
        return $this->webhookUrl;
    }

    public function send($card)
    {


        $response = $this->client->post($this->webhookUrl, [RequestOptions::JSON => $card]);

        $responseBody = json_decode($response->getBody()->getContents());

        if ($responseBody->status === "error") {
            throw new RingCentralException($responseBody);
        }

        return $responseBody;
    }
}
