<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210225173403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usu_disp ADD usuario_id INT DEFAULT NULL, ADD dispositivos_id INT DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE usu_disp ADD CONSTRAINT FK_1AEB85B1DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usu_disp ADD CONSTRAINT FK_1AEB85B1205B2266 FOREIGN KEY (dispositivos_id) REFERENCES dispositivos (id)');
        $this->addSql('CREATE INDEX IDX_1AEB85B1DB38439E ON usu_disp (usuario_id)');
        $this->addSql('CREATE INDEX IDX_1AEB85B1205B2266 ON usu_disp (dispositivos_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usu_disp DROP FOREIGN KEY FK_1AEB85B1DB38439E');
        $this->addSql('ALTER TABLE usu_disp DROP FOREIGN KEY FK_1AEB85B1205B2266');
        $this->addSql('DROP INDEX IDX_1AEB85B1DB38439E ON usu_disp');
        $this->addSql('DROP INDEX IDX_1AEB85B1205B2266 ON usu_disp');
        $this->addSql('ALTER TABLE usu_disp DROP usuario_id, DROP dispositivos_id, CHANGE id id INT NOT NULL');
    }
}
