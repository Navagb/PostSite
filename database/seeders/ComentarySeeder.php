<?php

namespace Database\Seeders;

use App\Models\Comentary;
use Illuminate\Database\Seeder;

class ComentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comentary::factory()->count(60)->create();
    }
}
