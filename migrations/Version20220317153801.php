<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317153801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, ecusson_id INT NOT NULL, nom VARCHAR(255) NOT NULL, nb_joueur INT NOT NULL, UNIQUE INDEX UNIQ_2449BA155CB74C80 (ecusson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, user_id INT DEFAULT NULL, date LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_8933C4326D861B89 (equipe_id), INDEX IDX_8933C432A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, url VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, equipe_id INT NOT NULL, nom VARCHAR(255) NOT NULL, nationnalite VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, numero INT DEFAULT NULL, INDEX IDX_FD71A9C56D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA155CB74C80 FOREIGN KEY (ecusson_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C4326D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C4326D861B89');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA155CB74C80');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A76ED395');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE user');
    }
}
