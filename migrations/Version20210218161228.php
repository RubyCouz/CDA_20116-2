<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218161228 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enklo (id INT AUTO_INCREMENT NOT NULL, capacite INT NOT NULL, surface VARCHAR(50) NOT NULL, environnement INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monkey ADD enklo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monkey ADD CONSTRAINT FK_B0E2AF30E214D8AC FOREIGN KEY (enklo_id) REFERENCES enklo (id)');
        $this->addSql('CREATE INDEX IDX_B0E2AF30E214D8AC ON monkey (enklo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monkey DROP FOREIGN KEY FK_B0E2AF30E214D8AC');
        $this->addSql('DROP TABLE enklo');
        $this->addSql('DROP INDEX IDX_B0E2AF30E214D8AC ON monkey');
        $this->addSql('ALTER TABLE monkey DROP enklo_id');
    }
}
