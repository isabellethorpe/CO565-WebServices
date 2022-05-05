<?php


use Phinx\Seed\AbstractSeed;

class NotificationSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'child_id'    => 1,
                'parent_id'    => 1,
                'notification_sent'    => 1,
                'type'    => 'email',
                'sent'    =>    date('Y-m-d H:i:s'),
            ]
        ];

        $notifications = $this->table('notifications');
        $notifications->insert($data)
              ->saveData();   
    }
}
