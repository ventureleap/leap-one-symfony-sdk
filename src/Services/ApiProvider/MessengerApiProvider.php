<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\MessengerService\Api\MessageApi;
use VentureLeap\MessengerService\Api\TemplateApi;
use VentureLeap\MessengerService\Configuration;
use VentureLeap\UserService\Api\ConfigurationEntryApi;

class MessengerApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'MESSENGER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getMessageApi(): MessageApi
    {
        return new MessageApi(null, $this->getConfiguration());
    }

    public function getTemplateApi(): TemplateApi
    {
        return new TemplateApi(null, $this->getConfiguration());
    }
}
