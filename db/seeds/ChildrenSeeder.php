<?php


use Phinx\Seed\AbstractSeed;

class ChildrenSeeder extends AbstractSeed
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

        // empty children table
        $this->table('children')->truncate();
        
        $data = [
            [
                'parent_id'    => 1,
                'name'    => 'April',
                'special_requirements'   => 0,
            ]
        ];

        $children = $this->table('children');
        $children->insert($data)
              ->saveData();   
    }
}

