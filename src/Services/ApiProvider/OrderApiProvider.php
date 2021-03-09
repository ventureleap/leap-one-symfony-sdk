<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;


use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order\Order;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order\OrderProduct;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order\OrderVoucher;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order\Voucher;
use VentureLeap\OrderService\Configuration;
use VentureLeap\OrderService\Api\ConfigurationEntryApi;

class OrderApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'ORDER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getOrderApi(): Order
    {
        return new Order(null, $this->getConfiguration());
    }

    public function getOrderProductApi(): OrderProduct
    {
        return new OrderProduct(null, $this->getConfiguration());
    }

    public function getVoucherApi(): Voucher
    {
        return new Voucher(null, $this->getConfiguration());
    }

    public function getOrderVoucherApi(): OrderVoucher
    {
        return new OrderVoucher(null, $this->getConfiguration());
    }
}
