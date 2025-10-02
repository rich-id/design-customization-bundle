<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

class Version20240502145400 extends AbstractMigration
{
    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE module_design_customization_configuration CHANGE type type VARCHAR(255) NOT NULL');
    }
}
