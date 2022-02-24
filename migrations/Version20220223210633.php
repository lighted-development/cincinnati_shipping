<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220223210633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE BatchControlLtl (id INT AUTO_INCREMENT NOT NULL, ltlPicker VARCHAR(50) DEFAULT NULL, ltlLines VARCHAR(40) DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BatchControlSd (id INT AUTO_INCREMENT NOT NULL, sdPicker VARCHAR(30) DEFAULT NULL, sdLines VARCHAR(30) DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BatchControlVor (id INT AUTO_INCREMENT NOT NULL, vorPicker VARCHAR(30) DEFAULT NULL, vorLines VARCHAR(30) DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Criteria (id INT AUTO_INCREMENT NOT NULL, dealerInvoice VARCHAR(100) DEFAULT NULL, employeeNum VARCHAR(50) DEFAULT NULL, closed TINYINT(1) NOT NULL, closedTime DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE DealerInvoice (id INT AUTO_INCREMENT NOT NULL, invoice VARCHAR(30) NOT NULL, comments VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Employee (id INT AUTO_INCREMENT NOT NULL, empNum VARCHAR(50) NOT NULL, fName VARCHAR(50) DEFAULT NULL, lName VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Main (id INT AUTO_INCREMENT NOT NULL, dealerInvoice VARCHAR(100) NOT NULL, comment VARCHAR(255) DEFAULT NULL, empNum VARCHAR(100) DEFAULT NULL, fName VARCHAR(100) DEFAULT NULL, lName VARCHAR(100) DEFAULT NULL, asgnDate DATE DEFAULT NULL, asgnTime TIME DEFAULT NULL, closed TINYINT(1) NOT NULL, closedTime DATE DEFAULT NULL, ordType VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE MainBackup (id INT AUTO_INCREMENT NOT NULL, dealerInvoice VARCHAR(100) NOT NULL, comment VARCHAR(255) DEFAULT NULL, empNum VARCHAR(100) DEFAULT NULL, fName VARCHAR(100) DEFAULT NULL, lName VARCHAR(100) DEFAULT NULL, asgnDate DATE DEFAULT NULL, asgnTime TIME DEFAULT NULL, closed TINYINT(1) NOT NULL, closedTime DATE DEFAULT NULL, ordType VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE BatchControlLtl');
        $this->addSql('DROP TABLE BatchControlSd');
        $this->addSql('DROP TABLE BatchControlVor');
        $this->addSql('DROP TABLE Criteria');
        $this->addSql('DROP TABLE DealerInvoice');
        $this->addSql('DROP TABLE Employee');
        $this->addSql('DROP TABLE Main');
        $this->addSql('DROP TABLE MainBackup');
    }
}
