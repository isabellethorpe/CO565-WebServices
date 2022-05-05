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
        // Users table
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
              

        // Meals table
        $meals = $this->table('meals');
        $meals
              ->addColumn('name', 'string', ['limit' => 150])
              ->addColumn('weight', 'integer') 
              ->addColumn('description', 'text', ['limit' => 300])
              ->addColumn('calories', 'integer')
              ->create();


        // Children table
        $children = $this->table('children');
        $children
              ->addColumn('parent_id', 'integer')
              ->addColumn('name', 'string', ['limit' => 60]) 
              ->addColumn('special_requirements', 'boolean')
              ->create();

              
        // Meal Planning table
        $meal_planning = $this->table('meal_planning');
        $meal_planning
              ->addColumn('child_id', 'integer')
              ->addColumn('meal_id', 'integer')
              ->addColumn('date', 'datetime')
              ->create();


        // Notifications table
        $notifications = $this->table('notifications');
        $notifications
              ->addColumn('child_id', 'integer')
              ->addColumn('parent_id', 'integer')
              ->addColumn('notification_sent', 'boolean') 
              ->addColumn('type', 'string', ['limit' => 25])
              ->addColumn('sent', 'datetime')
              ->create();
    }
}

