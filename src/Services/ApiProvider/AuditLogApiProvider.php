<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use AutoMapperPlus\AutoMapperPlusBundle\src\Services\ApiProvider\LeapOneApiProvider;
use VentureLeap\AuditLogService\Api\AuditLogEntryApi;
use VentureLeap\AuditLogService\Api\ConfigurationEntryApi;
use VentureLeap\AuditLogService\Configuration;

class AuditLogApiProvider extends LeapOneApiProvider
{
    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getAuditLogEntryApi(): AuditLogEntryApi
    {
        return new AuditLogEntryApi(null, $this->getConfiguration());
    }
}
