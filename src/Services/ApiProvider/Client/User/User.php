<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\User\UserFilter;
use VentureLeap\UserService\Api\UserApi;

class User extends UserApi
{
    public function getFilteredCollectionWithHttpInfo(UserFilter $filter)
    {
        return $this->getUserCollectionWithHttpInfo(
            $filter->getUsername(),
            $filter->getEmail(),
            $filter->getFirstName(),
            $filter->getLastName(),
            $filter->getCustomData(),
            $filter->getUserType(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }

    public function  getFilteredCollection(UserFilter $filter)
    {
        return $this->getUserCollection(
            $filter->getUsername(),
            $filter->getEmail(),
            $filter->getFirstName(),
            $filter->getLastName(),
            $filter->getCustomData(),
            $filter->getUserType(),
            $filter->getActive(),
            $filter->getDeleted(),
            $filter->getPage(),
            $filter->getItemsPerPage(),
            $filter->getPagination()
        );
    }
}
