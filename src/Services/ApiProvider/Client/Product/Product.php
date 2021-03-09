<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Product\ProductFilter;
use VentureLeap\ProductService\Api\ProductApi;

class Product extends ProductApi
{
    public function getFilteredCollectionWithHttpInfo(ProductFilter $filter)
    {
        return $this->getProductCollectionWithHttpInfo(
            $filter->getCustomData(),
            $filter->getName(),
            $filter->getCategories(),
            $filter->getOrderName(),
            $filter->getActive(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination(),
            $filter->getAcceptLanguage()
        );
    }

    public function getFilteredCollection(ProductFilter $filter)
    {
        return $this->getProductCollection(
            $filter->getCustomData(),
            $filter->getName(),
            $filter->getCategories(),
            $filter->getOrderName(),
            $filter->getActive(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination(),
            $filter->getAcceptLanguage()
        );
    }

}
