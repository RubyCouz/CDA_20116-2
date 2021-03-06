<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218142100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monkey ADD enclo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monkey ADD CONSTRAINT FK_B0E2AF30E475AC1 FOREIGN KEY (enclo_id) REFERENCES enclo (id)');
        $this->addSql('CREATE INDEX IDX_B0E2AF30E475AC1 ON monkey (enclo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monkey DROP FOREIGN KEY FK_B0E2AF30E475AC1');
        $this->addSql('DROP INDEX IDX_B0E2AF30E475AC1 ON monkey');
        $this->addSql('ALTER TABLE monkey DROP enclo_id');
    }
}
