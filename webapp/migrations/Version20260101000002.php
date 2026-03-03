<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260101000002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'If true, contest has preliminary test';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<SQL
ALTER TABLE contest
    ADD preliminary_judging tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'If true, contest has preliminary test';
SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contest DROP preliminary_judging;');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
