<?php

namespace Database\Seeders;

use App\Models\CategorieTask;
use Illuminate\Database\Seeder;

class CategorieTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieTask::factory(10)->create();
    }
}
