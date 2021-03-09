<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order\VoucherFilter;
use VentureLeap\OrderService\Api\VoucherApi;

class Voucher extends VoucherApi
{
    public function getFilteredCollectionWithHttpInfo(VoucherFilter $filter)
    {
        return $this->getVoucherCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getVoucherCode(),
            $filter->getVoucherType(),
            $filter->getValue(),
            $filter->getQuantity(),
            $filter->getQuantityPerPerson(),
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
            $filter->getValidFromBefore(),
            $filter->getValidFromStrictlyBefore(),
            $filter->getValidFromAfter(),
            $filter->getValidFromStrictlyAfter(),
            $filter->getValidToBefore(),
            $filter->getValidToStrictlyBefore(),
            $filter->getValidToAfter(),
            $filter->getValidToStrictlyAfter(),
            $filter->getOrderVoucherType(),
            $filter->getOrderVoucherCode(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderActive(),
            $filter->getOrderDeleted(),
            $filter->getOrderValidFrom(),
            $filter->getOrderValidTo(),
            $filter->getPage()
        );
    }

    public function  getFilteredCollection(VoucherFilter $filter)
    {
        return $this->getVoucherCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getVoucherCode(),
            $filter->getVoucherType(),
            $filter->getValue(),
            $filter->getQuantity(),
            $filter->getQuantityPerPerson(),
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
            $filter->getValidFromBefore(),
            $filter->getValidFromStrictlyBefore(),
            $filter->getValidFromAfter(),
            $filter->getValidFromStrictlyAfter(),
            $filter->getValidToBefore(),
            $filter->getValidToStrictlyBefore(),
            $filter->getValidToAfter(),
            $filter->getValidToStrictlyAfter(),
            $filter->getOrderVoucherType(),
            $filter->getOrderVoucherCode(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderActive(),
            $filter->getOrderDeleted(),
            $filter->getOrderValidFrom(),
            $filter->getOrderValidTo(),
            $filter->getPage()
        );
    }
}
