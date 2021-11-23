<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;

/**
 * As this initially get's the token, we have to handle it slightly differently.
 */
class TokenApiProvider
{
    private LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider;

    public function __construct(
        LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider
    ) {
        $this->leapOneConnectionCredentialsProvider = $leapOneConnectionCredentialsProvider;
    }

    public function getTokenApi(): TokenApi
    {
        return new TokenApi(null, $this->getConfiguration());
    }

    protected function getConfiguration(): Configuration
    {
        $configuration = new Configuration();
        $configuration->setHost($this->leapOneConnectionCredentialsProvider->getEndpoint());

        return $configuration;
    }
}
