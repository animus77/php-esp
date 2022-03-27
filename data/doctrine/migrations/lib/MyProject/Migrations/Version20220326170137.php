<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220326170137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating user table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE users (
            id INT AUTO_INCREMENT NOT NULL, 
            ref VARCHAR(45) NOT NULL, 
            addres VARCHAR(45) NOT NULL, 
            bottle INT NOT NULL, 
            created_at TIMESTAMP NOT NULL, 
            updated_at TIMESTAMP NOT NULL, 
            PRIMARY KEY(id))');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE users');
    }
}
