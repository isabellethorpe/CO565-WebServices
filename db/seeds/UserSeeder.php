<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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

        $this->table('users')->truncate();

        $data = [
            [
                'email'    => 'nigellalawson@microwave.com',
                'mobile'    => '07777777666',
                'first_name'    => 'Nigella',
                'last_name'    => 'Lawson',
                'password'      => password_hash('password', PASSWORD_DEFAULT),
                'user_type'    => 'admin',
                'email_notifications'    => 1,
                'sms_notifications'    => 1,
                'created' => date('Y-m-d H:i:s'),
            ],

            [
                'email'    => 'jonjackson@munched.com',
                'mobile'    => '07696969696',
                'first_name'    => 'Jon',
                'last_name'    => 'Jackson',
                'password'      => password_hash('password', PASSWORD_DEFAULT),
                'user_type'    => 'parent',
                'email_notifications'    => 1,
                'sms_notifications'    => 1,
                'created' => date('Y-m-d H:i:s'),
            ]
        ];

        $users = $this->table('users');
        $users->insert($data)
              ->saveData();   
    }
}
