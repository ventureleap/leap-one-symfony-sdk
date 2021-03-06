<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Rating;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Rating\RatingFilter;
use VentureLeap\RatingService\Api\RatingApi;

class Rating extends RatingApi
{
    public function getFilteredCollectionWithHttpInfo(RatingFilter $filter)
    {
        return $this->getRatingCollectionWithHttpInfo(
            $filter->getProductUuid(),
            $filter->getExistsReview(),
            $filter->getCustomData(),
            $filter->getPage()
        );
    }

    public function getFilteredCollection(RatingFilter $filter)
    {
        return $this->getRatingCollection(
            $filter->getProductUuid(),
            $filter->getExistsReview(),
            $filter->getCustomData(),
            $filter->getPage()
        );
    }

}
