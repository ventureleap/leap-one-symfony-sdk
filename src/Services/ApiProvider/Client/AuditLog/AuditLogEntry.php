<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\AuditLog;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\AuditLog\AuditLogEntryFilter;
use VentureLeap\AuditLogService\Api\AuditLogEntryApi;

class AuditLogEntry extends AuditLogEntryApi
{
    public function getFilteredCollectionWithHttpInfo(AuditLogEntryFilter $filter)
    {
        $this->getAuditLogEntryCollectionWithHttpInfo(
            $filter->getEntityUuid(), //$entity_uuid
            $filter->getUserUuid(), //$user_uuid,
            $filter->getEntityType(), //$entity_type,
            $filter->getOrderUuid(), //$order_uuid,
            $filter->getOrderUserUuid(), //$order_user_uuid,
            $filter->getOrderEntityUuid(), //$order_entity_uuid,
            $filter->getOrderEntityType(), //$order_entity_type,
            $filter->getOrderUrl(), //$order_url,
            $filter->getOrderBody(), //$order_body,
            $filter->getOrderEntryType(), //$order_entry_type,
            $filter->getOrderApplicationId(), //$order_application_id,
            $filter->getOrderCreatedAt(), //$order_created_at,
            $filter->getOrderUpdatedAt(), //$order_updated_at,
            $filter->getPage() //$page
        );
    }

    public function getFilteredCollection(AuditLogEntryFilter $filter)
    {
        $this->getAuditLogEntryCollection(
            $filter->getEntityUuid(), //$entity_uuid
            $filter->getUserUuid(), //$user_uuid,
            $filter->getEntityType(), //$entity_type,
            $filter->getOrderUuid(), //$order_uuid,
            $filter->getOrderUserUuid(), //$order_user_uuid,
            $filter->getOrderEntityUuid(), //$order_entity_uuid,
            $filter->getOrderEntityType(), //$order_entity_type,
            $filter->getOrderUrl(), //$order_url,
            $filter->getOrderBody(), //$order_body,
            $filter->getOrderEntryType(), //$order_entry_type,
            $filter->getOrderApplicationId(), //$order_application_id,
            $filter->getOrderCreatedAt(), //$order_created_at,
            $filter->getOrderUpdatedAt(), //$order_updated_at,
            $filter->getPage() //$page
        );
    }

}
