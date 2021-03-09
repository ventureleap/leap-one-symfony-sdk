<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\User\AccountFilter;
use VentureLeap\UserService\Api\AccountApi;

class Account extends AccountApi
{
    public function getFilteredCollectionWithHttpInfo(AccountFilter $filter)
    {
        return $this->getAccountCollectionWithHttpInfo(
            $filter->getAccountNumber(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }

    public function  getFilteredCollection(AccountFilter $filter)
    {
        return $this->getAccountCollection(
            $filter->getAccountNumber(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }
}
