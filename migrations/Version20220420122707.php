<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420122707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Première Migration';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lego_set (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, year INT DEFAULT NULL, current_value NUMERIC(8, 2) DEFAULT NULL, owned TINYINT(1) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, video VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE minifig (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, character_name VARCHAR(255) DEFAULT NULL, year INT DEFAULT NULL, current_value NUMERIC(8, 2) DEFAULT NULL, owned TINYINT(1) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE minifig_lego_set (minifig_id INT NOT NULL, lego_set_id INT NOT NULL, INDEX IDX_8E98C61199624115 (minifig_id), INDEX IDX_8E98C61143EA11B8 (lego_set_id), PRIMARY KEY(minifig_id, lego_set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_theme (id INT AUTO_INCREMENT NOT NULL, theme_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_7B3183B159027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_theme_minifig (sub_theme_id INT NOT NULL, minifig_id INT NOT NULL, INDEX IDX_85A78C16E3AD9ADE (sub_theme_id), INDEX IDX_85A78C1699624115 (minifig_id), PRIMARY KEY(sub_theme_id, minifig_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_theme_lego_set (sub_theme_id INT NOT NULL, lego_set_id INT NOT NULL, INDEX IDX_7CDA75F8E3AD9ADE (sub_theme_id), INDEX IDX_7CDA75F843EA11B8 (lego_set_id), PRIMARY KEY(sub_theme_id, lego_set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_minifig (tag_id INT NOT NULL, minifig_id INT NOT NULL, INDEX IDX_21586341BAD26311 (tag_id), INDEX IDX_2158634199624115 (minifig_id), PRIMARY KEY(tag_id, minifig_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_lego_set (tag_id INT NOT NULL, lego_set_id INT NOT NULL, INDEX IDX_89714E40BAD26311 (tag_id), INDEX IDX_89714E4043EA11B8 (lego_set_id), PRIMARY KEY(tag_id, lego_set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_minifig (user_id INT NOT NULL, minifig_id INT NOT NULL, INDEX IDX_4B6450E1A76ED395 (user_id), INDEX IDX_4B6450E199624115 (minifig_id), PRIMARY KEY(user_id, minifig_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lego_set (user_id INT NOT NULL, lego_set_id INT NOT NULL, INDEX IDX_5FCDD19BA76ED395 (user_id), INDEX IDX_5FCDD19B43EA11B8 (lego_set_id), PRIMARY KEY(user_id, lego_set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE minifig_lego_set ADD CONSTRAINT FK_8E98C61199624115 FOREIGN KEY (minifig_id) REFERENCES minifig (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE minifig_lego_set ADD CONSTRAINT FK_8E98C61143EA11B8 FOREIGN KEY (lego_set_id) REFERENCES lego_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sub_theme ADD CONSTRAINT FK_7B3183B159027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE sub_theme_minifig ADD CONSTRAINT FK_85A78C16E3AD9ADE FOREIGN KEY (sub_theme_id) REFERENCES sub_theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sub_theme_minifig ADD CONSTRAINT FK_85A78C1699624115 FOREIGN KEY (minifig_id) REFERENCES minifig (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sub_theme_lego_set ADD CONSTRAINT FK_7CDA75F8E3AD9ADE FOREIGN KEY (sub_theme_id) REFERENCES sub_theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sub_theme_lego_set ADD CONSTRAINT FK_7CDA75F843EA11B8 FOREIGN KEY (lego_set_id) REFERENCES lego_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_minifig ADD CONSTRAINT FK_21586341BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_minifig ADD CONSTRAINT FK_2158634199624115 FOREIGN KEY (minifig_id) REFERENCES minifig (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_lego_set ADD CONSTRAINT FK_89714E40BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_lego_set ADD CONSTRAINT FK_89714E4043EA11B8 FOREIGN KEY (lego_set_id) REFERENCES lego_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_minifig ADD CONSTRAINT FK_4B6450E1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_minifig ADD CONSTRAINT FK_4B6450E199624115 FOREIGN KEY (minifig_id) REFERENCES minifig (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lego_set ADD CONSTRAINT FK_5FCDD19BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lego_set ADD CONSTRAINT FK_5FCDD19B43EA11B8 FOREIGN KEY (lego_set_id) REFERENCES lego_set (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE minifig_lego_set DROP FOREIGN KEY FK_8E98C61143EA11B8');
        $this->addSql('ALTER TABLE sub_theme_lego_set DROP FOREIGN KEY FK_7CDA75F843EA11B8');
        $this->addSql('ALTER TABLE tag_lego_set DROP FOREIGN KEY FK_89714E4043EA11B8');
        $this->addSql('ALTER TABLE user_lego_set DROP FOREIGN KEY FK_5FCDD19B43EA11B8');
        $this->addSql('ALTER TABLE minifig_lego_set DROP FOREIGN KEY FK_8E98C61199624115');
        $this->addSql('ALTER TABLE sub_theme_minifig DROP FOREIGN KEY FK_85A78C1699624115');
        $this->addSql('ALTER TABLE tag_minifig DROP FOREIGN KEY FK_2158634199624115');
        $this->addSql('ALTER TABLE user_minifig DROP FOREIGN KEY FK_4B6450E199624115');
        $this->addSql('ALTER TABLE sub_theme_minifig DROP FOREIGN KEY FK_85A78C16E3AD9ADE');
        $this->addSql('ALTER TABLE sub_theme_lego_set DROP FOREIGN KEY FK_7CDA75F8E3AD9ADE');
        $this->addSql('ALTER TABLE tag_minifig DROP FOREIGN KEY FK_21586341BAD26311');
        $this->addSql('ALTER TABLE tag_lego_set DROP FOREIGN KEY FK_89714E40BAD26311');
        $this->addSql('ALTER TABLE sub_theme DROP FOREIGN KEY FK_7B3183B159027487');
        $this->addSql('ALTER TABLE user_minifig DROP FOREIGN KEY FK_4B6450E1A76ED395');
        $this->addSql('ALTER TABLE user_lego_set DROP FOREIGN KEY FK_5FCDD19BA76ED395');
        $this->addSql('DROP TABLE lego_set');
        $this->addSql('DROP TABLE minifig');
        $this->addSql('DROP TABLE minifig_lego_set');
        $this->addSql('DROP TABLE sub_theme');
        $this->addSql('DROP TABLE sub_theme_minifig');
        $this->addSql('DROP TABLE sub_theme_lego_set');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_minifig');
        $this->addSql('DROP TABLE tag_lego_set');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_minifig');
        $this->addSql('DROP TABLE user_lego_set');
    }
}
