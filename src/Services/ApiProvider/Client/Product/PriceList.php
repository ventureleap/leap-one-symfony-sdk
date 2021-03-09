<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Product\PriceListFilter;
use VentureLeap\ProductService\Api\PriceListApi;

class PriceList extends PriceListApi
{
    public function getFilteredCollectionWithHttpInfo(PriceListFilter $filter)
    {
        return $this->getPriceListCollectionWithHttpInfo(
            $filter->getName(),
            $filter->getCustomData(),
            $filter->getPagination()
        );
    }

    public function getFilteredCollection(PriceListFilter $filter)
    {
        return $this->getPriceListCollection(
            $filter->getName(),
            $filter->getCustomData(),
            $filter->getPagination()
        );
    }

}
