<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for ($i=0; $i < 100; $i++) { 
            # code...
            $faker = Faker::create();
    
            $data = [
                'kategori' => $faker->city,
                'keterangan' => $faker->text
            ];
    
            Kategori::create($data);
        }

    }

}
