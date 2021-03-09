<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Renderer\Render;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\Renderer\Template;
use VentureLeap\RendererService\Configuration;
use VentureLeap\RendererService\Api\ConfigurationEntryApi;

class RendererApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'RENDERER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getTemplateApi(): Template
    {
        return new Template(null, $this->getConfiguration());
    }

    public function getRenderApi(): Render
    {
        return new Render(null, $this->getConfiguration());
    }
}
