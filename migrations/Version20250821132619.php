<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250821132619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture ADD listing_id INT NOT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89D4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F89D4619D1A ON picture (listing_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89D4619D1A');
        $this->addSql('DROP INDEX IDX_16DB4F89D4619D1A ON picture');
        $this->addSql('ALTER TABLE picture DROP listing_id');
    }
}
