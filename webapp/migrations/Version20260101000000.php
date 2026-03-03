<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260101000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Mark submission verdict as pretests passed';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<SQL
ALTER TABLE judging
    ADD pretests_passed tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'If true, mark verdict as pretests passed',
    ADD ignored tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'If true, mark pretests verdict as ignored';
SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE judging DROP pretests_passed, DROP ignored;');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
