<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order\OrderProductFilter;
use VentureLeap\OrderService\Api\OrderProductApi;

class OrderProduct extends OrderProductApi
{
    public function getFilteredCollectionWithHttpInfo(OrderProductFilter $filter)
    {
        return $this->getOrderProductCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getName(),
            $filter->getUom(),
            $filter->getProductId(),
            $filter->getPage()
        );
    }

    public function  getFilteredCollection(OrderProductFilter $filter)
    {
        return $this->getOrderProductCollection(
            $filter->getProperties(),
            $filter->getName(),
            $filter->getUom(),
            $filter->getProductId(),
            $filter->getPage()
        );
    }
}
