<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;


use VentureLeap\AuditLogService\Api\AuditLogEntryApi;
use VentureLeap\AuditLogService\Api\ConfigurationEntryApi;
use VentureLeap\AuditLogService\Configuration;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\AuditLog\AuditLogEntry;

class AuditLogApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'AUDIT_LOG';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getAuditLogEntryApi(): AuditLogEntry
    {
        return new AuditLogEntry(null, $this->getConfiguration());
    }
}
