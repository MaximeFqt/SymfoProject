<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302173923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe ADD joueurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15A3DC7281 FOREIGN KEY (joueurs_id) REFERENCES joueur (id)');
        $this->addSql('CREATE INDEX IDX_2449BA15A3DC7281 ON equipe (joueurs_id)');
        $this->addSql('ALTER TABLE joueur DROP prenom');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15A3DC7281');
        $this->addSql('DROP INDEX IDX_2449BA15A3DC7281 ON equipe');
        $this->addSql('ALTER TABLE equipe DROP joueurs_id');
        $this->addSql('ALTER TABLE joueur ADD prenom VARCHAR(255) NOT NULL');
    }
}
