<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyFirstMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $users = $this->table('users');
        $users
              ->addColumn('password', 'string', ['limit' => 40])
              ->addColumn('email', 'string', ['limit' => 100])
              ->addColumn('mobile', 'string', ['limit' => 20])
              ->addColumn('first_name', 'string', ['limit' => 100])
              ->addColumn('last_name', 'string', ['limit' => 100])
              ->addColumn('user_type', 'string', ['limit' => 20])
              ->addColumn('email_notifications', 'boolean')
              ->addColumn('sms_notifications', 'boolean')
              ->addColumn('created', 'datetime', ['null' => true])
              ->addColumn('updated', 'datetime', ['null' => true])
              ->addIndex(['email'], ['unique' => true])
              ->create();
    }
}

/*
users
- user_id (PK)
- email
- password
- user_type (admin, parent)
- tel (text)
- email_notifications (boolean)
- sms_notifications (boolean)
*/
