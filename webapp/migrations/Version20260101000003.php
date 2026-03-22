<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260101000003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create queuepretask';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(<<<SQL
CREATE TABLE `queuepretask` (
    `queuepretaskid` INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'Queuepretask ID',
    `teamid` INT UNSIGNED DEFAULT NULL COMMENT 'Team ID',
    `judgingid` INT UNSIGNED DEFAULT NULL COMMENT 'Judging ID',
    `priority` INT NOT NULL COMMENT 'Priority; negative means higher priority',
    `teampriority` INT NOT NULL COMMENT 'Team Priority; somewhat magic, lower implies higher priority.',
    `starttime` NUMERIC(32, 9) UNSIGNED DEFAULT NULL COMMENT 'Time started work',
    INDEX queuepretaskid (queuepretaskid),
    INDEX priority (priority),
    INDEX teampriority (teampriority),
    INDEX teamid (teamid),
    INDEX starttime (starttime),
    INDEX judgingid (judgingid),
    PRIMARY KEY(queuepretaskid)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = 'Work items.'
SQL);
        $this->addSql('ALTER TABLE queuepretask ADD CONSTRAINT FK_queuepretask_teamid FOREIGN KEY (teamid) REFERENCES team (teamid) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE queuepretask ADD CONSTRAINT FK_queuepretask_judging FOREIGN KEY (judgingid) REFERENCES judging (judgingid) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `queuepretask`');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
