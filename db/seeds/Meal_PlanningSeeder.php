<?php


use Phinx\Seed\AbstractSeed;

class Meal_PlanningSeeder extends AbstractSeed
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

        $this->table('meal_planning')->truncate();

        $data = [
            [
                'child_id'    => 1,
                'meal_id'    => 1,
                'date'   => date('Y-m-d H:i:s'),
            ]
        ];

        $meal_planner = $this->table('meal_planning');
        $meal_planner->insert($data)
              ->saveData();   
    }
}
