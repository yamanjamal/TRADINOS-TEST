<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //i can seed but factory is easier
        //if u want to test pls run the command 
        //php artisan migrate:fresh --seed and your data will be seeded
        // go to user seeder to see admin info
        
        Categories::create([
            'name'=>'important',
            'color'=>'red',
        ]);

        Categories::factory(10)->create();
    }
}
