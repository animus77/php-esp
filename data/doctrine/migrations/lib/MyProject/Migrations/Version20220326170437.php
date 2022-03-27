<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220326170437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating data table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE data(
            id INT AUTO_INCREMENT NOT NULL,
            user_id INT NOT NULL,
            esp_id INT NOT NULL,
            info INT NOT NULL,
            date DATE NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT data_user
                FOREIGN KEY(user_id)
                REFERENCES users(id)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT
        )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE data');
    }
}
