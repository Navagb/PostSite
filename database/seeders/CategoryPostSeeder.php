<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 60) as $index) {
            DB::table('category_post')->insert([
                'category_id' => random_int(1, 10),
                'post_id' => random_int(1, 30),
            ]);
        }
    }
}
