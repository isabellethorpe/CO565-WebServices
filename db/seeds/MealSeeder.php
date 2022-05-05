<?php


use Phinx\Seed\AbstractSeed;

class MealSeeder extends AbstractSeed
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
                'name'    => 'Spaghetti Bolognese',
                'weight'    => 300,
                'description'    => 'Minced beef in tomato based sauce served over spaghetti',
                'calories'    => 420,
            ]
        ];

        $meals = $this->table('meals');
        $meals->insert($data)
              ->saveData();   
    }
}

