<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\RatingService\Configuration;
use VentureLeap\RatingService\Api\RatingApi;
use VentureLeap\RatingService\Api\ConfigurationEntryApi;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Rating\Rating;

class RatingApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'RATING';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getRatingApi(): Rating
    {
        return new Rating(null, $this->getConfiguration());
    }
}
