<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520152403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movimientos (id INT AUTO_INCREMENT NOT NULL, cuenta_id INT NOT NULL, tipo VARCHAR(1) NOT NULL, importe DOUBLE PRECISION NOT NULL, mes INT NOT NULL, numero_pedido VARCHAR(25) NOT NULL, categoria VARCHAR(25) NOT NULL, descripcion VARCHAR(100) DEFAULT NULL, saldo DOUBLE PRECISION NOT NULL, fecha VARCHAR(20) NOT NULL, INDEX IDX_AB16A8399AEFF118 (cuenta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movimientos ADD CONSTRAINT FK_AB16A8399AEFF118 FOREIGN KEY (cuenta_id) REFERENCES cuenta (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE movimientos');
    }
}
