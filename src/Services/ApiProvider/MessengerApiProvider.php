<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;

use VentureLeap\LeapOnePhpSdk\Services\TokenProvider\TokenProvider;
use VentureLeap\MessengerService\Api\MessageApi;
use VentureLeap\MessengerService\Api\TemplateApi;
use VentureLeap\MessengerService\Configuration;

class MessengerApiProvider
{

    /**
     * @var TokenProvider
     */
    private $tokenProvider;
    /**
     * @var string
     */
    private $messengerServiceHost;


    public function __construct(
        string $messengerServiceHost,
        TokenProvider $tokenProvider
    ) {
        $this->tokenProvider = $tokenProvider;
        $this->messengerServiceHost = $messengerServiceHost;
    }

    private function getConfiguration(): Configuration
    {
        $configuration = new Configuration();

        $configuration->setHost($this->messengerServiceHost);
        $configuration->setApiKey('Authorization', $this->tokenProvider->getToken());
        $configuration->setApiKeyPrefix('Authorization', 'Bearer');

        return $configuration;
    }

    public function getMessageApi(): MessageApi
    {
        return new MessageApi(null, $this->getConfiguration());
    }

    public function getTemplateApi(): TemplateApi
    {
        return new TemplateApi(null, $this->getConfiguration());
    }
}