<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service')->insert([
            'name' => 'Pangkas rambut di rumah',
            'description' => 'Memesan layanan pangkas ke rumah',
            'price' => '25000',
        ]);
    }
}
