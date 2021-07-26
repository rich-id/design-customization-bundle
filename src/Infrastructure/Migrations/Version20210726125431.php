<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

class Version20210726125431 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE module_design_customization_configuration (id INT UNSIGNED AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type ENUM(\'email\', \'font\', \'radius\', \'color\', \'image\') NOT NULL COMMENT \'(DC2Type:DesignConfigurationType)\', `position` INT UNSIGNED NOT NULL, value VARCHAR(600) DEFAULT NULL, default_value VARCHAR(600) NOT NULL, UNIQUE INDEX UNIQ_D4B1559D989D9B62 (slug), UNIQUE INDEX UNIQ_D4B1559D5E237E06 (name), UNIQUE INDEX design_configuration_type_position_UNIQUE (type, `position`), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE module_design_customization_configuration');
    }
}
