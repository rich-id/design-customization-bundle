<?php declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use RichCongress\BundleToolbox\Configuration\AbstractBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RichIdDesignCustomizationBundle extends AbstractBundle
{
    public const COMPILER_PASSES = [];

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $this->addDoctrineOrmMappingsPass($container);
    }

    private function addDoctrineOrmMappingsPass(ContainerBuilder $container): void
    {
        if (!\class_exists(DoctrineOrmMappingsPass::class)) {
            return;
        }

        $container->addCompilerPass(
            DoctrineOrmMappingsPass::createAnnotationMappingDriver(
                ['RichId\DesignCustomizationBundle\Domain\Entity'],
                [__DIR__ . '/../Domain/Entity']
            )
        );
    }
}
