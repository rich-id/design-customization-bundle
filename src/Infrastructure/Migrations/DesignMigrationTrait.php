<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Migrations;

trait DesignMigrationTrait
{
    protected function createDesignConfiguration(
        string $slug,
        string $name,
        string $type,
        string $defaultValue,
        int $position = 1
    ): void {
        $this->addSQL("
            INSERT INTO module_design_customization_configuration (slug, name, type, default_value, position) VALUES ('$slug', '$name', '$type', '$defaultValue', $position)
        ");
    }

    protected function deleteDesignConfiguration(string $slug): void
    {
        $this->addSQL("DELETE FROM module_design_customization_configuration WHERE slug = '$slug'");
    }
}
