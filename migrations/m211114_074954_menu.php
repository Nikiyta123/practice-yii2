<?php

use yii\db\Migration;

/**
 * Class m211114_074954_menu
 */
class m211114_074954_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $this->createTable('{{%menu}}', [
            'id'=> $this->primaryKey(11),
            'parent_id'=> $this->integer(11)->null()->defaultValue(null),
            'link'=> $this->string(255)->notNull()->defaultValue('#'),
            'link_attributes'=> $this->text()->notNull(),
            'icon_class'=> $this->string(255)->notNull(),
            'sort'=> $this->integer(11)->notNull()->defaultValue(0),
            'status'=> $this->tinyInteger(1)->notNull()->defaultValue(1),
        ], $tableOptions);
        $this->createIndex('parent_sort', '{{%menu}}', ['parent_id','sort'], false);
        $this->createTable('{{%menu_lang}}', [
            'owner_id'=> $this->integer(11)->notNull(),
            'language'=> $this->string(2)->notNull(),
            'name'=> $this->string(255)->notNull(),
            'title'=> $this->text()->notNull(),
        ], $tableOptions);
        $this->addPrimaryKey('pk_on_menu_lang', '{{%menu_lang}}', ['owner_id','language']);
        $this->addForeignKey(
            'fk_menu_lang_owner_id',
            '{{%menu_lang}}',
            'owner_id',
            '{{%menu}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        // Insert sample data
        $this->batchInsert(
            '{{%menu}}',
            ['id', 'parent_id', 'link', 'link_attributes', 'icon_class', 'sort', 'status'],
            [
                [
                    'id' => '1',
                    'parent_id' => null,
                    'link' => '#',
                    'link_attributes' => '',
                    'icon_class' => '',
                    'sort' => '0',
                    'status' => '0',
                ],
                [
                    'id' => '2',
                    'parent_id' => '1',
                    'link' => '/',
                    'link_attributes' => '',
                    'icon_class' => 'fa fa-home',
                    'sort' => '0',
                    'status' => '1',
                ],
            ]
        );
        $this->batchInsert(
            '{{%menu_lang}}',
            ['owner_id', 'language', 'name', 'title'],
            [
                [
                    'owner_id' => '1',
                    'language' => 'ru',
                    'name' => 'Главное меню',
                    'title' => '',
                ],
                [
                    'owner_id' => '1',
                    'language' => 'en',
                    'name' => 'Main menu',
                    'title' => '',
                ],
                [
                    'owner_id' => '2',
                    'language' => 'ru',
                    'name' => 'Главная',
                    'title' => 'Главная страница сайта',
                ],
                [
                    'owner_id' => '2',
                    'language' => 'en',
                    'name' => 'Home',
                    'title' => 'Site homepage',
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211114_074954_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211114_074954_menu cannot be reverted.\n";

        return false;
    }
    */
}
