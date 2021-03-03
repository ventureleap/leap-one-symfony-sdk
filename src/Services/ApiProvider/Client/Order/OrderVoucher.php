<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order\OrderVoucherFilter;
use VentureLeap\OrderService\Api\OrderVoucherApi;

class OrderVoucher extends OrderVoucherApi
{
    public function getFilteredCollectionWithHttpInfo(OrderVoucherFilter $filter)
    {
        $this->getOrderVoucherCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
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
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderActive(),
            $filter->getOrderDeleted(),
            $filter->getPage()
        );
    }

    public function  getFilteredCollection(OrderVoucherFilter $filter)
    {
        $this->getOrderVoucherCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
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
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderActive(),
            $filter->getOrderDeleted(),
            $filter->getPage()
        );
    }
}
