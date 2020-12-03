<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\ProductService\Api\ConfigurationEntryApi;
use VentureLeap\ProductService\Api\PriceListApi;
use VentureLeap\ProductService\Api\PriceListProductApi;
use VentureLeap\ProductService\Api\ProductApi;
use VentureLeap\ProductService\Api\ProductCategoryApi;
use VentureLeap\ProductService\Configuration;

class ProductApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'PRODUCT';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getProductApi(): ProductApi
    {
        return new ProductApi(null, $this->getConfiguration());
    }

    public function getProductCategoryApi(): ProductCategoryApi
    {
        return new ProductCategoryApi(null, $this->getConfiguration());
    }

    public function getPriceListProductApi(): PriceListProductApi
    {
        return new PriceListProductApi(null, $this->getConfiguration());
    }

    public function getPriceListApi(): PriceListApi
    {
        return new PriceListApi(null, $this->getConfiguration());
    }
}
