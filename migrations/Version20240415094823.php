<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240415094823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE action_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE action_condition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bonus_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE general_promo_code_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE promotion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE restriction_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE action (id INT NOT NULL, promo_id INT DEFAULT NULL, type_action VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_47CC8C92D0C07AFF ON action (promo_id)');
        $this->addSql('CREATE TABLE action_condition (id INT NOT NULL, action_id INT DEFAULT NULL, source INT NOT NULL, partner_code INT NOT NULL, partner_type INT NOT NULL, product_code TEXT NOT NULL, product_category VARCHAR(255) NOT NULL, placement TEXT NOT NULL, activity_code INT NOT NULL, data_source TEXT NOT NULL, page_unit TEXT NOT NULL, pay_from_name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_19D09B5E9D32F035 ON action_condition (action_id)');
        $this->addSql('COMMENT ON COLUMN action_condition.product_code IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN action_condition.placement IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN action_condition.data_source IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN action_condition.page_unit IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN action_condition.pay_from_name IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE bonus (id INT NOT NULL, promo_id INT DEFAULT NULL, bonus_number INT NOT NULL, bonus_sum INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9F987F7AD0C07AFF ON bonus (promo_id)');
        $this->addSql('CREATE TABLE general_promo_code (id INT NOT NULL, promo_id INT DEFAULT NULL, promo_code VARCHAR(255) NOT NULL, add_info TEXT NOT NULL, timestamp_expire TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, promo_amount INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4EB3B10FD0C07AFF ON general_promo_code (promo_id)');
        $this->addSql('CREATE TABLE promotion (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, partner_name VARCHAR(255) NOT NULL, partner_logo VARCHAR(255) NOT NULL, is_custom BOOLEAN NOT NULL, is_referral BOOLEAN NOT NULL, is_random BOOLEAN NOT NULL, random_selection_date DATE NOT NULL, is_general_promo_code BOOLEAN NOT NULL, promo_type VARCHAR(255) NOT NULL, cashback_type VARCHAR(255) NOT NULL, amount_reward INT DEFAULT NULL, percent_amount INT DEFAULT NULL, landing_page_link VARCHAR(255) NOT NULL, rule_link VARCHAR(255) NOT NULL, promo_start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, promo_finish_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, payment_organisation VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN promotion.random_selection_date IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN promotion.promo_start_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN promotion.promo_finish_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE restriction (id INT NOT NULL, promo_id INT DEFAULT NULL, number_client_participation INT NOT NULL, number_client_participation_product_type INT NOT NULL, number_client_participation_partner_code INT NOT NULL, is_limited BOOLEAN NOT NULL, amount_limit INT NOT NULL, client_geo TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7A999BCED0C07AFF ON restriction (promo_id)');
        $this->addSql('COMMENT ON COLUMN restriction.client_geo IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92D0C07AFF FOREIGN KEY (promo_id) REFERENCES promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE action_condition ADD CONSTRAINT FK_19D09B5E9D32F035 FOREIGN KEY (action_id) REFERENCES action (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bonus ADD CONSTRAINT FK_9F987F7AD0C07AFF FOREIGN KEY (promo_id) REFERENCES promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE general_promo_code ADD CONSTRAINT FK_4EB3B10FD0C07AFF FOREIGN KEY (promo_id) REFERENCES promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE restriction ADD CONSTRAINT FK_7A999BCED0C07AFF FOREIGN KEY (promo_id) REFERENCES promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE action_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE action_condition_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bonus_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE general_promo_code_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE promotion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE restriction_id_seq CASCADE');
        $this->addSql('ALTER TABLE action DROP CONSTRAINT FK_47CC8C92D0C07AFF');
        $this->addSql('ALTER TABLE action_condition DROP CONSTRAINT FK_19D09B5E9D32F035');
        $this->addSql('ALTER TABLE bonus DROP CONSTRAINT FK_9F987F7AD0C07AFF');
        $this->addSql('ALTER TABLE general_promo_code DROP CONSTRAINT FK_4EB3B10FD0C07AFF');
        $this->addSql('ALTER TABLE restriction DROP CONSTRAINT FK_7A999BCED0C07AFF');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_condition');
        $this->addSql('DROP TABLE bonus');
        $this->addSql('DROP TABLE general_promo_code');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE restriction');
    }
}
