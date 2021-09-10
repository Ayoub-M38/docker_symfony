<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210910092544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_publisher DROP FOREIGN KEY fk_gpu_gam');
        $this->addSql('ALTER TABLE region_sales DROP FOREIGN KEY fk_rs_gp');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY fk_gpl_gp');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY fk_gm_gen');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY fk_gpl_pla');
        $this->addSql('ALTER TABLE game_publisher DROP FOREIGN KEY fk_gpu_pub');
        $this->addSql('ALTER TABLE region_sales DROP FOREIGN KEY fk_rs_reg');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE top_rated_movies (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_platform');
        $this->addSql('DROP TABLE game_publisher');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE publisher');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE region_sales');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, genre_id INT DEFAULT NULL, game_name VARCHAR(200) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, INDEX fk_gm_gen (genre_id), INDEX idx_g_name (game_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE game_platform (id INT AUTO_INCREMENT NOT NULL, game_publisher_id INT DEFAULT NULL, platform_id INT DEFAULT NULL, release_year INT DEFAULT NULL, INDEX idx_gpl_gpid (game_publisher_id), INDEX idx_gpl_platformid (platform_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE game_publisher (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, publisher_id INT DEFAULT NULL, INDEX idx_gpu_gameid (game_id), INDEX idx_gpu_platformid (publisher_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, genre_name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, platform_name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE publisher (id INT AUTO_INCREMENT NOT NULL, publisher_name VARCHAR(100) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, region_name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE region_sales (region_id INT DEFAULT NULL, game_platform_id INT DEFAULT NULL, num_sales NUMERIC(5, 2) DEFAULT NULL, INDEX fk_rs_gp (game_platform_id), INDEX fk_rs_reg (region_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT fk_gm_gen FOREIGN KEY (genre_id) REFERENCES genre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT fk_gpl_gp FOREIGN KEY (game_publisher_id) REFERENCES game_publisher (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT fk_gpl_pla FOREIGN KEY (platform_id) REFERENCES platform (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE game_publisher ADD CONSTRAINT fk_gpu_gam FOREIGN KEY (game_id) REFERENCES game (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE game_publisher ADD CONSTRAINT fk_gpu_pub FOREIGN KEY (publisher_id) REFERENCES publisher (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE region_sales ADD CONSTRAINT fk_rs_gp FOREIGN KEY (game_platform_id) REFERENCES game_platform (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE region_sales ADD CONSTRAINT fk_rs_reg FOREIGN KEY (region_id) REFERENCES region (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE top_rated_movies');
    }
}
