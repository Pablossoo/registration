<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426110720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649a5d10e97 TO UNIQ_8D93D64959329EEA');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649bd936231 TO UNIQ_8D93D6493931747B');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d64959329eea TO UNIQ_8D93D649A5D10E97');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d6493931747b TO UNIQ_8D93D649BD936231');
    }
}
