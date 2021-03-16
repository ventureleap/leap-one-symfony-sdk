<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use AutoMapperPlus\AutoMapperPlusBundle\src\Services\ApiProvider\LeapOneConnectionCredentialsProviderInterface;
use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;

/**
 * As this initially get's the token, we have to handle it slightly differently.
 */
class TokenApiProvider
{
    private $endpoint;

    public function __construct(
        LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider
    ) {
        $this->endpoint = $leapOneConnectionCredentialsProvider->getEndpoint();
    }

    public function getTokenApi(): TokenApi
    {
        return new TokenApi(null, $this->getConfiguration());
    }

    protected function getConfiguration(): Configuration
    {
        $configuration = new Configuration();
        $configuration->setHost($this->endpoint);

        return $configuration;
    }
}
