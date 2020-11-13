<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112133131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE person_covid (id INT AUTO_INCREMENT NOT NULL, as_covid_id INT NOT NULL, infected_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_795F635CDCF54EA (as_covid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_place (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, place_id INT NOT NULL, visited_at DATETIME NOT NULL, INDEX IDX_D82B4C09A76ED395 (user_id), INDEX IDX_D82B4C09DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, street_number INT NOT NULL, postal_code VARCHAR(255) NOT NULL, max_number_of_persons INT NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthday DATE NOT NULL, gender VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person_covid ADD CONSTRAINT FK_795F635CDCF54EA FOREIGN KEY (as_covid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE person_place ADD CONSTRAINT FK_D82B4C09A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE person_place ADD CONSTRAINT FK_D82B4C09DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person_place DROP FOREIGN KEY FK_D82B4C09DA6A219');
        $this->addSql('ALTER TABLE person_covid DROP FOREIGN KEY FK_795F635CDCF54EA');
        $this->addSql('ALTER TABLE person_place DROP FOREIGN KEY FK_D82B4C09A76ED395');
        $this->addSql('DROP TABLE person_covid');
        $this->addSql('DROP TABLE person_place');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE user');
    }
}
