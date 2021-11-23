<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;


use VentureLeap\LeapOneSymfonySdk\Model\Configuration\ConfigurationEntry;
use VentureLeap\LeapOneSymfonySdk\Services\TokenProvider\TokenProvider;
use VentureLeap\UserService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Configuration;

abstract class AbstractLeapOneApiProvider
{
    /**
     * It should be easy to simplify this by using standardized namespaces for the
     * base classes in the SDK.
     */
    protected static $CONFIGURATION_CLASS = '';

    protected static $CONFIGURATION_ENTRY_API_CLASS = '';

    protected TokenProvider $tokenProvider;
    private LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider;

    public function __construct(
        LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider,
        TokenProvider $tokenProvider
    ) {
        $this->tokenProvider = $tokenProvider;
        $this->leapOneConnectionCredentialsProvider = $leapOneConnectionCredentialsProvider;
    }

    public function getConfigurationEntryApi(): object
    {
        return new static::$CONFIGURATION_ENTRY_API_CLASS(null, $this->getConfiguration());
    }

    public function getName(): string
    {
        return static::NAME;
    }

    protected function getConfiguration(): object
    {
        $configuration = new static::$CONFIGURATION_CLASS;

        $configuration->setHost($this->leapOneConnectionCredentialsProvider->getEndpoint());
        $configuration->setApiKey('Authorization', $this->tokenProvider->getToken());
        $configuration->setApiKeyPrefix('Authorization', 'Bearer');

        return $configuration;
    }
}
