<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Messenger\Message;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Messenger\Template;
use VentureLeap\MessengerService\Api\MessageApi;
use VentureLeap\MessengerService\Api\TemplateApi;
use VentureLeap\MessengerService\Configuration;
use VentureLeap\MessengerService\Api\ConfigurationEntryApi;

class MessengerApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'MESSENGER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getMessageApi(): Message
    {
        return new Message(null, $this->getConfiguration());
    }

    public function getTemplateApi(): Template
    {
        return new Template(null, $this->getConfiguration());
    }
}
