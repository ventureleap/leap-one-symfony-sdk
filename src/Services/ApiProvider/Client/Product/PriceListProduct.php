<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Product\PriceListProductFilter;
use VentureLeap\ProductService\Api\PriceListProductApi;

class PriceListProduct extends PriceListProductApi
{
    public function getFilteredCollectionWithHttpInfo(PriceListProductFilter $filter)
    {
        return $this->getPriceListProductCollectionWithHttpInfo(
            $filter->getProduct(),
            $filter->getPriceList(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination(),
        );
    }

    public function getFilteredCollection(PriceListProductFilter $filter)
    {
        return $this->getPriceListProductCollection(
            $filter->getProduct(),
            $filter->getPriceList(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination(),
        );
    }

}
