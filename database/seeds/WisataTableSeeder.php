<?php

use Illuminate\Database\Seeder;

class WisataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wisata')->insert([
            [
                'category_id' => 1, // Pastikan ID category yang sesuai ada di tabel categories
                'wisata' => 'Wisata Pantai Pandan',
                'desc' => 'Pantai indah dengan pemandangan menawan',
                'thumbnail' => 'img/selider5.jpg',
                'price' => 20000,
                'latitude' => '-6.301833341319379',
                'longitude' => '105.84155449691978',
                'address' => 'Pantai Pandan Carita Cafe and Resto, Jl. Raya Carita No.29, Sukajadi, Kec. Carita, Kabupaten Pandeglang, Banten 42264',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
