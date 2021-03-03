<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Order;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order\OrderFilter;
use VentureLeap\OrderService\Api\OrderApi;

class Order extends OrderApi
{
    public function getFilteredCollectionWithHttpInfo(OrderFilter $filter)
    {

        $this->getOrderCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getInternalComment(),
            $filter->getCustomerComment(),
            $filter->getBillingAddressFullName(),
            $filter->getBillingAddressCompanyName(),
            $filter->getOrderCode(),
            $filter->getStatus(),
            $filter->getPaymentStatus(),
            $filter->getCustomerUuid(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getDateOfValidityBefore(),
            $filter->getDateOfValidityStrictlyBefore(),
            $filter->getDateOfValidityAfter(),
            $filter->getDateOfValidityStrictlyAfter(),
            $filter->getOrderStatus(),
            $filter->getOrderPaymentStatus(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderPaymentDate(),
            $filter->getOrderOrderCode(),
            $filter->getOrderCustomerUuid(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }

    public function  getFilteredCollection(OrderFilter $filter)
    {
        $this->getOrderCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getInternalComment(),
            $filter->getCustomerComment(),
            $filter->getBillingAddressFullName(),
            $filter->getBillingAddressCompanyName(),
            $filter->getOrderCode(),
            $filter->getStatus(),
            $filter->getPaymentStatus(),
            $filter->getCustomerUuid(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getDateOfValidityBefore(),
            $filter->getDateOfValidityStrictlyBefore(),
            $filter->getDateOfValidityAfter(),
            $filter->getDateOfValidityStrictlyAfter(),
            $filter->getOrderStatus(),
            $filter->getOrderPaymentStatus(),
            $filter->getOrderCreatedAt(),
            $filter->getOrderUpdatedAt(),
            $filter->getOrderPaymentDate(),
            $filter->getOrderOrderCode(),
            $filter->getOrderCustomerUuid(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }
}
