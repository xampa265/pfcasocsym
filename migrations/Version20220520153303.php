<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520153303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asociados (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(25) NOT NULL, apellidos VARCHAR(100) NOT NULL, dni VARCHAR(9) NOT NULL, telefono VARCHAR(9) DEFAULT NULL, poblacion VARCHAR(30) NOT NULL, provincia VARCHAR(30) NOT NULL, email VARCHAR(100) DEFAULT NULL, cuenta VARCHAR(24) NOT NULL, profesion VARCHAR(100) DEFAULT NULL, anyo_nac VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE asociados');
    }
}
