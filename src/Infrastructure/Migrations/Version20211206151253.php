<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

class Version20211206151253 extends AbstractMigration
{
    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE module_design_customization_configuration ADD accessibility_default_value VARCHAR(600) DEFAULT NULL, ADD accessibility_value VARCHAR(600) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE module_design_customization_configuration DROP accessibility_default_value, DROP accessibility_value');
    }
}
