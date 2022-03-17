<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315142847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audiometrie (id INT AUTO_INCREMENT NOT NULL, medecin_id INT DEFAULT NULL, patient_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, typeaudiometrie VARCHAR(255) NOT NULL, typeoreille VARCHAR(255) NOT NULL, INDEX IDX_861FCB894F31A84 (medecin_id), INDEX IDX_861FCB896B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point (id INT AUTO_INCREMENT NOT NULL, audiometrie_id INT DEFAULT NULL, abscisse VARCHAR(255) NOT NULL, ordonnee VARCHAR(255) NOT NULL, INDEX IDX_B7A5F3242DA3E6C9 (audiometrie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE audiometrie ADD CONSTRAINT FK_861FCB894F31A84 FOREIGN KEY (medecin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE audiometrie ADD CONSTRAINT FK_861FCB896B899279 FOREIGN KEY (patient_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE point ADD CONSTRAINT FK_B7A5F3242DA3E6C9 FOREIGN KEY (audiometrie_id) REFERENCES audiometrie (id)');
        $this->addSql('ALTER TABLE produit CHANGE montant montant INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE point DROP FOREIGN KEY FK_B7A5F3242DA3E6C9');
        $this->addSql('ALTER TABLE audiometrie DROP FOREIGN KEY FK_861FCB894F31A84');
        $this->addSql('ALTER TABLE audiometrie DROP FOREIGN KEY FK_861FCB896B899279');
        $this->addSql('DROP TABLE audiometrie');
        $this->addSql('DROP TABLE point');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE produit CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE couleur couleur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE montant montant VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
