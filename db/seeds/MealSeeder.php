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

        $this->table('meals')->truncate();

        $data = [
            [
                'name'    => 'Spaghetti Bolognese',
                'weight'    => 300,
                'description'    => 'Homemade Spaghetti & Italian ragù, served with Parmesan Cheese.',
                'calories'    => 420
            ],

            [
                'name'    => 'Jacket Potato with Baked Beans & Cheese (V)',
                'weight'    => 370,
                'description'    => 'Crispy Baked Potato, Homemade Tomato Sauce, Butter Beans & Grated Cheddar (V)',
                'calories'    => 669
            ],

            [
                'name'    => 'Breaded Fish & Chips',
                'weight'    => 320,
                'description'    => 'Baked Panko Breaded Cod, Crushed Minted Peas & Handcut Chunky Chips',
                'calories'    => 343
            ],

            [
                'name'    => 'Sausage & Mash',
                'weight'    => 420,
                'description'    => 'Award Winning Pork Sausages, Homemade Yorkshire Pudding, Seasonal Vegetables, Buttered Mash & Onion Gravy',
                'calories'    => 555
            ],

            [
                'name'    => 'Chicken Korma with Rice',
                'weight'    => 360,
                'description'    => 'Mild & Creamy Curry, British Chicken Thigh Chunks, Coconut and Indian Spices.',
                'calories'    => 626
            ],

            [
                'name'    => 'MEAT Medical Diet',
                'weight'    => 350,
                'description'    => 'MEAT MEDICAL DIET - Evidence needs to be provided',
                'calories'    => 424
            ],

            [
                'name'    => 'VEGETARIAN Medical Diet',
                'weight'    => 300,
                'description'    => 'VEGETARIAN MEDICAL DIET - Evidence needs to be provided ',
                'calories'    => 400
            ],

        ];

    

        $meals = $this->table('meals');
        $meals->insert($data)
              ->saveData();   
    }
}

