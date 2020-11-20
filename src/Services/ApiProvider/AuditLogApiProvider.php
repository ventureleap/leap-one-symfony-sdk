<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\AuditLogService\Api\AuditLogEntryApi;
use VentureLeap\AuditLogService\Configuration;
use VentureLeap\LeapOnePhpSdk\Services\TokenProvider\TokenProvider;

class AuditLogApiProvider
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

    public function getAuditLogEntryApi(): AuditLogEntryApi
    {
        return new AuditLogEntryApi(null, $this->getConfiguration());
    }
}