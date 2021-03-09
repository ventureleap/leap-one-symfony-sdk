<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\User\AddressFilter;
use VentureLeap\UserService\Api\AddressApi;

class Address extends AddressApi
{
    public function getFilteredCollectionWithHttpInfo(AddressFilter $filter)
    {
        $this->getAddressCollectionWithHttpInfo(
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }

    public function  getFilteredCollection(AddressFilter $filter)
    {
        $this->getUserCollection(

        );
    }
}
