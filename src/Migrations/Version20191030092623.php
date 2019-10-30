<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030092623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE berita_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE kategori_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE berita (id INT NOT NULL, kategori_id INT NOT NULL, pengirim_id INT NOT NULL, judul VARCHAR(255) NOT NULL, isi VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, soft_delete BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_52FA824BF89C2B38 ON berita (kategori_id)');
        $this->addSql('CREATE INDEX IDX_52FA824B704E5C83 ON berita (pengirim_id)');
        $this->addSql('CREATE TABLE kategori (id INT NOT NULL, nama VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pengirim (id INT NOT NULL, nama VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE berita ADD CONSTRAINT FK_52FA824BF89C2B38 FOREIGN KEY (kategori_id) REFERENCES kategori (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE berita ADD CONSTRAINT FK_52FA824B704E5C83 FOREIGN KEY (pengirim_id) REFERENCES pengirim (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE berita DROP CONSTRAINT FK_52FA824BF89C2B38');
        $this->addSql('ALTER TABLE berita DROP CONSTRAINT FK_52FA824B704E5C83');
        $this->addSql('DROP SEQUENCE berita_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE kategori_id_seq CASCADE');
        $this->addSql('DROP TABLE berita');
        $this->addSql('DROP TABLE kategori');
        $this->addSql('DROP TABLE pengirim');
    }
}
