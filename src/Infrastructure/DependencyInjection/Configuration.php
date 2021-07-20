<?php declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\DependencyInjection;

use RichCongress\BundleToolbox\Configuration\AbstractConfiguration;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class Configuration extends AbstractConfiguration
{
    public const CONFIG_NODE = 'rich_id_design_customization';

    protected function buildConfig(NodeBuilder $rootNode): void
    {
    }
}
