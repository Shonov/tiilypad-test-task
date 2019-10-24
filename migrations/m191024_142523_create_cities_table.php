<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cities}}`.
 */
class m191024_142523_create_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'country_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk-city-country_id', '{{%cities}}', 'country_id', '{{%countries}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-city-country_id',
            '{{%cities}}'
        );

        $this->dropTable('{{%cities}}');
    }
}
