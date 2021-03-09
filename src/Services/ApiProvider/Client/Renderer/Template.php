<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Renderer;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Renderer\TemplateFilter;
use VentureLeap\RendererService\Api\TemplateApi;

class Template extends TemplateApi
{
    public function getFilteredCollectionWithHttpInfo(TemplateFilter $filter)
    {
        $this->getTemplateCollectionWithHttpInfo(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getFileName(),
            $filter->getFileType(),
            $filter->getTemplateKey(),
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

    public function getFilteredCollection(TemplateFilter $filter)
    {
        $this->getTemplateCollection(
            $filter->getProperties(),
            $filter->getCustomData(),
            $filter->getFileName(),
            $filter->getFileType(),
            $filter->getTemplateKey(),
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

}
