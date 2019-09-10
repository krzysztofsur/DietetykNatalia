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
        
        $this->call(RecipesTableSeeder::class);
        $this->call(PersonalDataTableSeeder::class);
        $this->call(MeasurementsTableSeeder::class);
        $this->call(DiaryTableSeeder::class);
        $this->call(IllnessTableSeeder::class);
        $this->call(AllergiesTableSeeder::class);
        $this->call(IllnessAndAllergiesTableSeeder::class);
        $this->call(UserRequestTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
