<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Option;

//Database Seeder
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

        //Call Questions Table Seeder
        $this->call(QuestionTableSeeder::class);

        //Call Options Table Seeder
        $this->call(OptionTableSeeder::class);

        Model::reguard();
    }
}

//Seeds Questions Table
class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Faker Client
        $faker= \Faker\Factory::create();
        
        //Truncate Old Questions Table
        Question::truncate();
        
        //Enter 50 Questions
        foreach(range(1,50) as $index)  
        {
            //Create a Questions entry
            Question::create([     
            'question_type' => $faker->sentence(1),
            'question_data' => $faker->sentence(12)." ?",
            'created_at' =>  '31011996',
            'updated_at' => '123456',
            ]);
        }
    }
}

//Seeds Options Table
class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Faker Client
        $faker= \Faker\Factory::create();

        //Truncate Old Options Table
        Option::truncate();

        //Enter 200 Options
        foreach(range(1,200) as $index)
        {
            //For correct Options
            $correct_flag= rand(0,1);
            
            //Create an Options Entry
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