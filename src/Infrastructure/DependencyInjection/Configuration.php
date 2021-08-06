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
        $this->customFonts($rootNode);
        $this->googleFontsApiKey($rootNode);
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

    protected function customFonts(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->arrayNode('custom_fonts')
            ->normalizeKeys(false)
            ->useAttributeAsKey('key')
            ->example(['My custom font' => 'https://my_font.test/font.css',])
            ->scalarPrototype();
    }

    protected function googleFontsApiKey(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->scalarNode('google_fonts_api_key')
            ->defaultValue('');
    }

    protected function imageUploadsDir(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->scalarNode('image_uploads_dir')
            ->defaultValue('/uploads/design');
    }
}
