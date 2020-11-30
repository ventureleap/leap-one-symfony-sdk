<?php


namespace AutoMapperPlus\AutoMapperPlusBundle\src\Services\ApiProvider;


use VentureLeap\LeapOnePhpSdk\Services\TokenProvider\TokenProvider;
use VentureLeap\UserService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Configuration;

abstract class LeapOneApiProvider
{
    protected static $CONFIGURATION_CLASS = '';

    protected static $CONFIGURATION_ENTRY_API_CLASS = '';

    /**
     * @var string
     */
    protected $endpoint = '';
    /**
     * @var TokenProvider
     */
    private TokenProvider $tokenProvider;

    public function __construct(
        string $endpoint,
        TokenProvider $tokenProvider
    ) {
        $this->endpoint = $endpoint;
        $this->tokenProvider = $tokenProvider;
    }

    public function getConfigurationEntryApi(): object
    {
        return new self::$CONFIGURATION_ENTRY_API_CLASS(null, $this->getConfiguration());
    }

    protected function getConfiguration(): object
    {
        $configuration = new self::$CONFIGURATION_CLASS;

        $configuration->setHost($this->endpoint);
        $configuration->setApiKey('Authorization', $this->tokenProvider->getToken());
        $configuration->setApiKeyPrefix('Authorization', 'Bearer');

        return $configuration;
    }
}
