<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\DependencyInjection;

use RichCongress\BundleToolbox\Configuration\AbstractConfiguration;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class Configuration extends AbstractConfiguration
{
    public const CONFIG_NODE = 'rich_id_design_customization';

    protected function buildConfig(NodeBuilder $rootNode): void
    {
        $this->addAdminRoles($rootNode);
        $this->cssCustomizationPrefix($rootNode);
        $this->imageUploadsDir($rootNode);
    }

    protected function addAdminRoles(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->arrayNode('admin_roles')
            ->example(['ROLE_ADMIN'])
            ->scalarPrototype();
    }

    protected function cssCustomizationPrefix(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->scalarNode('css_customization_prefix')
            ->defaultValue('rich-id-customization');
    }

    protected function imageUploadsDir(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->scalarNode('image_uploads_dir')
            ->defaultValue('/uploads/design');
    }
}
