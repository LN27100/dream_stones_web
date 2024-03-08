<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308105437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE is_buy DROP FOREIGN KEY is_buy_ibfk_1');
        $this->addSql('ALTER TABLE is_buy DROP FOREIGN KEY is_buy_ibfk_2');
        $this->addSql('DROP INDEX ORDERS_ID ON is_buy');
        $this->addSql('DROP INDEX IDX_83E721BF76563D85 ON is_buy');
        $this->addSql('ALTER TABLE is_buy ADD id INT AUTO_INCREMENT NOT NULL, DROP PRODUCT_ID, DROP ORDERS_ID, DROP ORDERED_QUANTITY, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE orders RENAME INDEX orders_number TO UNIQ_E52FFDEEBB696D4A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY product_ibfk_1');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY product_ibfk_2');
        $this->addSql('DROP INDEX SPL_ID ON product');
        $this->addSql('DROP INDEX TYPE_ID ON product');
        $this->addSql('ALTER TABLE product RENAME INDEX product_ref TO UNIQ_D34A04ADF4406ABC');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY product_image_ibfk_1');
        $this->addSql('ALTER TABLE product_image DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_image CHANGE IMAGE_ID id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F034584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_image ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE product_image RENAME INDEX product_id TO IDX_64617F034584665A');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY review_ibfk_1');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY review_ibfk_2');
        $this->addSql('DROP INDEX PRODUCT_ID ON review');
        $this->addSql('DROP INDEX USERPROFIL_ID ON review');
        $this->addSql('ALTER TABLE review DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE review DROP REVIEW_NOTE, DROP REVIEW_DESCRIPTION, DROP USERPROFIL_ID, DROP PRODUCT_ID, CHANGE REVIEW_ID id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE review ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE supplier DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE supplier DROP SPL_NAME, CHANGE SPL_ID id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE supplier ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE type CHANGE TYPE_CATEGORY TYPE_CATEGORY VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX USERPROFIL_PHONE ON userprofil');
        $this->addSql('ALTER TABLE userprofil RENAME INDEX userprofil_mail TO UNIQ_8E2CA5533F7EE199');
        $this->addSql('ALTER TABLE userprofil RENAME INDEX userprofil_pseudo TO UNIQ_8E2CA553B868EADC');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE is_buy MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE is_buy DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE is_buy ADD PRODUCT_ID INT NOT NULL, ADD ORDERS_ID INT NOT NULL, ADD ORDERED_QUANTITY INT DEFAULT NULL, DROP id');
        $this->addSql('ALTER TABLE is_buy ADD CONSTRAINT is_buy_ibfk_1 FOREIGN KEY (PRODUCT_ID) REFERENCES product (PRODUCT_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE is_buy ADD CONSTRAINT is_buy_ibfk_2 FOREIGN KEY (ORDERS_ID) REFERENCES orders (ORDERS_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX ORDERS_ID ON is_buy (ORDERS_ID)');
        $this->addSql('CREATE INDEX IDX_83E721BF76563D85 ON is_buy (PRODUCT_ID)');
        $this->addSql('ALTER TABLE is_buy ADD PRIMARY KEY (PRODUCT_ID, ORDERS_ID)');
        $this->addSql('ALTER TABLE orders RENAME INDEX uniq_e52ffdeebb696d4a TO ORDERS_NUMBER');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT product_ibfk_1 FOREIGN KEY (SPL_ID) REFERENCES supplier (SPL_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT product_ibfk_2 FOREIGN KEY (TYPE_ID) REFERENCES type (TYPE_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX SPL_ID ON product (SPL_ID)');
        $this->addSql('CREATE INDEX TYPE_ID ON product (TYPE_ID)');
        $this->addSql('ALTER TABLE product RENAME INDEX uniq_d34a04adf4406abc TO PRODUCT_REF');
        $this->addSql('ALTER TABLE product_image MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F034584665A');
        $this->addSql('ALTER TABLE product_image DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_image CHANGE id IMAGE_ID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT product_image_ibfk_1 FOREIGN KEY (PRODUCT_ID) REFERENCES product (PRODUCT_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product_image ADD PRIMARY KEY (IMAGE_ID)');
        $this->addSql('ALTER TABLE product_image RENAME INDEX idx_64617f034584665a TO PRODUCT_ID');
        $this->addSql('ALTER TABLE review MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE review DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE review ADD REVIEW_NOTE INT NOT NULL, ADD REVIEW_DESCRIPTION VARCHAR(250) NOT NULL, ADD USERPROFIL_ID INT NOT NULL, ADD PRODUCT_ID INT NOT NULL, CHANGE id REVIEW_ID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT review_ibfk_1 FOREIGN KEY (USERPROFIL_ID) REFERENCES userprofil (USERPROFIL_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT review_ibfk_2 FOREIGN KEY (PRODUCT_ID) REFERENCES product (PRODUCT_ID) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX PRODUCT_ID ON review (PRODUCT_ID)');
        $this->addSql('CREATE INDEX USERPROFIL_ID ON review (USERPROFIL_ID)');
        $this->addSql('ALTER TABLE review ADD PRIMARY KEY (REVIEW_ID)');
        $this->addSql('ALTER TABLE supplier MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE supplier DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE supplier ADD SPL_NAME VARCHAR(50) DEFAULT NULL, CHANGE id SPL_ID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE supplier ADD PRIMARY KEY (SPL_ID)');
        $this->addSql('ALTER TABLE type CHANGE TYPE_CATEGORY TYPE_CATEGORY VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX USERPROFIL_PHONE ON userprofil (USERPROFIL_PHONE)');
        $this->addSql('ALTER TABLE userprofil RENAME INDEX uniq_8e2ca5533f7ee199 TO USERPROFIL_MAIL');
        $this->addSql('ALTER TABLE userprofil RENAME INDEX uniq_8e2ca553b868eadc TO USERPROFIL_PSEUDO');
    }
}
