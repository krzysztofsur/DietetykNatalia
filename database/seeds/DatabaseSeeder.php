<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(RecipesTableSeeder::class);
        //$this->call(PersonalDataTableSeeder::class);
        //$this->call(MeasurementsTableSeeder::class);
        //$this->call(DiaryTableSeeder::class);
        //$this->call(IllnessTableSeeder::class);
        //$this->call(AllergiesTableSeeder::class);
        $this->call(IllnessAndAllergiesTableSeeder::class);

    }
}
