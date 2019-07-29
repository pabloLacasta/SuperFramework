<?php

use Phinx\Migration\AbstractMigration;

class CreatePosts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $posts = $this->table('posts');
        $posts->addColumn('title', 'string', ['limit'=>80]);
        $posts->addColumn('body', 'string',['limit'=>1000] );
        $posts->addColumn('name', 'string',['limit'=>100] );
        $posts->addColumn('created_at', 'datetime' );
        $posts->addColumn('updated_at', 'datetime',['null'=>true] );// null true indica que no e sun campo obligarotrio. Puede ser null
        $posts->create();

    }
}
