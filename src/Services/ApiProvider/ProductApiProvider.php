<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;


use VentureLeap\ProductService\Api\ConfigurationEntryApi;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product\Product;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product\ProductCategory;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product\PriceList;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Product\PriceListProduct;
use VentureLeap\ProductService\Configuration;

class ProductApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'PRODUCT';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getProductApi(): Product
    {
        return new Product(null, $this->getConfiguration());
    }

    public function getProductCategoryApi(): ProductCategory
    {
        return new ProductCategory(null, $this->getConfiguration());
    }

    public function getPriceListProductApi(): PriceListProduct
    {
        return new PriceListProduct(null, $this->getConfiguration());
    }

    public function getPriceListApi(): PriceList
    {
        return new PriceList(null, $this->getConfiguration());
    }
}
