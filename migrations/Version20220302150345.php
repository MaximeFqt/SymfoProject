<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302150345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe ADD ecusson VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur ADD nationnalite VARCHAR(255) NOT NULL, ADD poste VARCHAR(255) NOT NULL, CHANGE numero numero INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP ecusson');
        $this->addSql('ALTER TABLE joueur DROP nationnalite, DROP poste, CHANGE numero numero INT NOT NULL');
    }
}
