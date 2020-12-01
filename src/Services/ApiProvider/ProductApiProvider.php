<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\LeapOnePhpSdk\Services\TokenProvider\TokenProvider;
use VentureLeap\ProductService\Api\ProductApi;
use VentureLeap\ProductService\Configuration;

class ProductApiProvider
{

    /**
     * @var TokenProvider
     */
    private $tokenProvider;
    /**
     * @var string
     */
    private $auditLogServiceHost;


    public function __construct(
        string $auditLogServiceHost,
        TokenProvider $tokenProvider
    ) {
        $this->tokenProvider = $tokenProvider;
        $this->auditLogServiceHost = $auditLogServiceHost;
    }

    private function getConfiguration(): Configuration
    {
        $configuration = new Configuration();

        $configuration->setHost($this->auditLogServiceHost);
        $configuration->setApiKey('Authorization', $this->tokenProvider->getToken());
        $configuration->setApiKeyPrefix('Authorization', 'Bearer');

        return $configuration;
    }

    public function getProductApi(): ProductApi
    {
        return new ProductApi(null, $this->getConfiguration());
    }
}