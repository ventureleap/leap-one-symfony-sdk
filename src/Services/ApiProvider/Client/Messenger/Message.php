<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Messenger;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Messenger\MessageFilter;
use VentureLeap\MessengerService\Api\MessageApi;

class Message extends MessageApi
{
    public function getFilteredCollectionWithHttpInfo(MessageFilter $filter)
    {
        return $this->getMessageCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getSubject(),
            $filter->getContent(),
            $filter->getMessageType(),
            $filter->getStatus(),
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
            $filter->getOrderStatus(),
            $filter->getOrderMessageType(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderSubject(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }

    public function  getFilteredCollection(MessageFilter $filter)
    {
        return $this->getMessageCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getSubject(),
            $filter->getContent(),
            $filter->getMessageType(),
            $filter->getStatus(),
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
            $filter->getOrderStatus(),
            $filter->getOrderMessageType(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderSubject(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }
}
