<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260101000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Preliminary testscases for PRETEST scoring';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<SQL
ALTER TABLE testcase
    ADD pretest tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Preliminary testscases for PRETEST scoring';
SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE testcase DROP pretest;');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
