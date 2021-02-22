<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\RendererService\Api\RenderApi;
use VentureLeap\RendererService\Api\TemplateApi;
use VentureLeap\RendererService\Configuration;
use VentureLeap\RendererService\Api\ConfigurationEntryApi;

class RendererApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'RENDERER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getTemplateApi(): TemplateApi
    {
        return new TemplateApi(null, $this->getConfiguration());
    }

    public function getRenderApi(): RenderApi
    {
        return new RenderApi(null, $this->getConfiguration());
    }
}
