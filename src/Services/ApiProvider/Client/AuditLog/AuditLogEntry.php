<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\AuditLog;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\AuditLog\AuditLogEntryFilter;
use VentureLeap\AuditLogService\Api\AuditLogEntryApi;

class AuditLogEntry extends AuditLogEntryApi
{
    public function getFilteredCollectionWithHttpInfo(AuditLogEntryFilter $filter)
    {
        $this->getAuditLogEntryCollectionWithHttpInfo(
            $filter->getEntityUuid(),
            $filter->getUserUuid(),
            $filter->getEntityType(),
            $filter->getOrderUuid(),
            $filter->getOrderUserUuid(),
            $filter->getOrderEntityUuid(),
            $filter->getOrderEntityType(),
            $filter->getOrderUrl(),
            $filter->getOrderBody(),
            $filter->getOrderEntryType(),
            $filter->getOrderApplicationId(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getPage()
        );
    }

    public function getFilteredCollection(AuditLogEntryFilter $filter)
    {
        $this->getAuditLogEntryCollection(
            $filter->getEntityUuid(),
            $filter->getUserUuid(),
            $filter->getEntityType(),
            $filter->getOrderUuid(),
            $filter->getOrderUserUuid(),
            $filter->getOrderEntityUuid(),
            $filter->getOrderEntityType(),
            $filter->getOrderUrl(),
            $filter->getOrderBody(),
            $filter->getOrderEntryType(),
            $filter->getOrderApplicationId(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getPage()
        );
    }

}
