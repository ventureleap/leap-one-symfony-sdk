<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Renderer;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Renderer\RenderFilter;
use VentureLeap\RendererService\Api\RenderApi;

class Render extends RenderApi
{
    public function getFilteredCollectionWithHttpInfo(RenderFilter $filter)
    {
        return $this->getRenderCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getFileName(),
            $filter->getFileType(),
            $filter->getCreatedAtBefore(),
            $filter->getCreatedAtStrictlyBefore(),
            $filter->getCreatedAtAfter(),
            $filter->getCreatedAtStrictlyAfter(),
            $filter->getUpdatedAtBefore(),
            $filter->getUpdatedAtStrictlyBefore(),
            $filter->getUpdatedAtAfter(),
            $filter->getUpdatedAtStrictlyAfter(),
            $filter->getPage()
        );
    }

    public function getFilteredCollection(RenderFilter $filter)
    {
        return $this->getRenderCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getFileName(),
            $filter->getFileType(),
            $filter->getCreatedAtAfter(),
            $filter->getCreatedAtStrictlyBefore(),
            $filter->getCreatedAtAfter(),
            $filter->getCreatedAtStrictlyAfter(),
            $filter->getUpdatedAtAfter(),
            $filter->getUpdatedAtStrictlyBefore(),
            $filter->getUpdatedAtAfter(),
            $filter->getUpdatedAtStrictlyAfter(),
            $filter->getPage()
        );
    }

}
