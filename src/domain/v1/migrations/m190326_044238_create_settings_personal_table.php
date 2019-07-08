<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

class m190326_044238_create_settings_personal_table extends Migration
{

    public $table = 'settings_personal';

    /**
     * @inheritdoc
     */
    public function getColumns()
    {
        return [
            'user_id' => $this->integer()->notNull()->comment('ID пользователя'),
            'data' => $this->json()->comment('Настройки'),
        ];
    }

    public function afterCreate()
    {
        $this->myCreateIndexUnique(['user_id']);
        $this->myAddForeignKey(
            'user_id',
            'user_login',
            'id',
            'CASCADE',
            'CASCADE'
        );
        /*$this->myAddForeignKey(
            'language',
            'language',
            'code',
            'CASCADE',
            'CASCADE'
        );*/
    }

}