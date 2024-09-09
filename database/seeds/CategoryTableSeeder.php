<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category' => 'Wisata',
                'thumbnail' => 'img/selider5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
