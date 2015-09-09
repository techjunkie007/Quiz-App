<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Option;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(QuestionTableSeeder::class);
        $this->call(OptionTableSeeder::class);


        Model::reguard();
    }
}
class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= \Faker\Factory::create();
        
        Question::truncate();
        
        foreach(range(1,50) as $index)  
        {
            Question::create([     
            'question_type' => $faker->sentence(1),
            'question_data' => $faker->sentence(12),
            'created_at' =>  '31011996',
            'updated_at' => '123456',
            ]);
        }
    }
}
class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= \Faker\Factory::create();

        Option::truncate();

        foreach(range(1,200) as $index)
        {
            $correct_flag= rand(0,1);
            Option::create([
                'question_id' => $index/4,
                'option_data' => $faker->sentence(2),
                'correct_flag' => $correct_flag,
                'created_at' => '12345678',
                'updated_at' =>'12345678',
                ]);
        }
    }
}