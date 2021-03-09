<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Messenger;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Messenger\TemplateFilter;
use VentureLeap\MessengerService\Api\TemplateApi;

class Template extends TemplateApi
{
    public function getFilteredCollectionWithHttpInfo(TemplateFilter $filter)
    {
        $this->getTemplateCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getEmailTemplate(),
            $filter->getSmsTemplate(),
            $filter->getSubject(),
            $filter->getLanguage(),
            $filter->getTemplateType(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getCreatedAtBefore(),
            $filter->getCreatedAtStrictlyBefore(),
            $filter->getCreatedAtAfter(),
            $filter->getCreatedAtStrictlyAfter(),
            $filter->getUpdatedAtBefore(),
            $filter->getUpdatedAtStrictlyBefore(),
            $filter->getUpdatedAtAfter(),
            $filter->getUpdatedAtStrictlyAfter(),
            $filter->getOrderTemplateType(),
            $filter->getOrderLanguage(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderSubject(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }

    public function  getFilteredCollection(TemplateFilter $filter)
    {
        $this->getTemplateCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getEmailTemplate(),
            $filter->getSmsTemplate(),
            $filter->getSubject(),
            $filter->getLanguage(),
            $filter->getTemplateType(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getCreatedAtBefore(),
            $filter->getCreatedAtStrictlyBefore(),
            $filter->getCreatedAtAfter(),
            $filter->getCreatedAtStrictlyAfter(),
            $filter->getUpdatedAtBefore(),
            $filter->getUpdatedAtStrictlyBefore(),
            $filter->getUpdatedAtAfter(),
            $filter->getUpdatedAtStrictlyAfter(),
            $filter->getOrderTemplateType(),
            $filter->getOrderLanguage(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderSubject(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }
}
