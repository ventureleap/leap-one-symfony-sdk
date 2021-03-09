<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Product\ProductCategoryFilter;
use VentureLeap\ProductService\Api\ProductCategoryApi;

class ProductCategory extends ProductCategoryApi
{
    public function getFilteredCollectionWithHttpInfo(ProductCategoryFilter $filter)
    {
        return $this->getProductCategoryCollectionWithHttpInfo(
            $filter->getName(),
            $filter->getProducts(),
            $filter->getCustomData(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination(),
            $filter->getAcceptLanguage()
        );
    }

    public function getFilteredCollection(ProductCategoryFilter $filter)
    {
        return $this->getProductCategoryCollection(
            $filter->getName(),
            $filter->getProducts(),
            $filter->getCustomData(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination(),
            $filter->getAcceptLanguage()
        );
    }

}
