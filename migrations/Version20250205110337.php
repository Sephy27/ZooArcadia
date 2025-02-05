<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250205110337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals_pictures (animals_id INT NOT NULL, pictures_id INT NOT NULL, INDEX IDX_C79A491132B9E58 (animals_id), INDEX IDX_C79A491BC415685 (pictures_id), PRIMARY KEY(animals_id, pictures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitats_pictures (habitats_id INT NOT NULL, pictures_id INT NOT NULL, INDEX IDX_DE8A26B135D3C6F5 (habitats_id), INDEX IDX_DE8A26B1BC415685 (pictures_id), PRIMARY KEY(habitats_id, pictures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals_pictures ADD CONSTRAINT FK_C79A491132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animals_pictures ADD CONSTRAINT FK_C79A491BC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE habitats_pictures ADD CONSTRAINT FK_DE8A26B135D3C6F5 FOREIGN KEY (habitats_id) REFERENCES habitats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE habitats_pictures ADD CONSTRAINT FK_DE8A26B1BC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animals ADD habitats_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD35D3C6F5 FOREIGN KEY (habitats_id) REFERENCES habitats (id)');
        $this->addSql('CREATE INDEX IDX_966C69DD35D3C6F5 ON animals (habitats_id)');
        $this->addSql('ALTER TABLE avis ADD id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF079F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF079F37AE5 ON avis (id_user_id)');
        $this->addSql('ALTER TABLE rapport_veterinaire ADD id_animal_id INT DEFAULT NULL, ADD id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rapport_veterinaire ADD CONSTRAINT FK_CE729CDEEA39031 FOREIGN KEY (id_animal_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE rapport_veterinaire ADD CONSTRAINT FK_CE729CDE79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_CE729CDEEA39031 ON rapport_veterinaire (id_animal_id)');
        $this->addSql('CREATE INDEX IDX_CE729CDE79F37AE5 ON rapport_veterinaire (id_user_id)');
        $this->addSql('ALTER TABLE services ADD id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E16979F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_7332E16979F37AE5 ON services (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals_pictures DROP FOREIGN KEY FK_C79A491132B9E58');
        $this->addSql('ALTER TABLE animals_pictures DROP FOREIGN KEY FK_C79A491BC415685');
        $this->addSql('ALTER TABLE habitats_pictures DROP FOREIGN KEY FK_DE8A26B135D3C6F5');
        $this->addSql('ALTER TABLE habitats_pictures DROP FOREIGN KEY FK_DE8A26B1BC415685');
        $this->addSql('DROP TABLE animals_pictures');
        $this->addSql('DROP TABLE habitats_pictures');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD35D3C6F5');
        $this->addSql('DROP INDEX IDX_966C69DD35D3C6F5 ON animals');
        $this->addSql('ALTER TABLE animals DROP habitats_id');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF079F37AE5');
        $this->addSql('DROP INDEX IDX_8F91ABF079F37AE5 ON avis');
        $this->addSql('ALTER TABLE avis DROP id_user_id');
        $this->addSql('ALTER TABLE rapport_veterinaire DROP FOREIGN KEY FK_CE729CDEEA39031');
        $this->addSql('ALTER TABLE rapport_veterinaire DROP FOREIGN KEY FK_CE729CDE79F37AE5');
        $this->addSql('DROP INDEX IDX_CE729CDEEA39031 ON rapport_veterinaire');
        $this->addSql('DROP INDEX IDX_CE729CDE79F37AE5 ON rapport_veterinaire');
        $this->addSql('ALTER TABLE rapport_veterinaire DROP id_animal_id, DROP id_user_id');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E16979F37AE5');
        $this->addSql('DROP INDEX IDX_7332E16979F37AE5 ON services');
        $this->addSql('ALTER TABLE services DROP id_user_id');
    }
}
