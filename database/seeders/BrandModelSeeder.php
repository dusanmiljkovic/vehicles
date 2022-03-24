<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('brand_models')->count() == 0) {

            DB::table('brand_models')->insert([
                [
                    'brand_id' => 1,
                    'name' => 'Atlas',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 1,
                    'name' => 'Tiguan',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 1,
                    'name' => 'Taos',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 1,
                    'name' => 'Passat',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 1,
                    'name' => 'Golf',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 2,
                    'name' => 'GLA SUV',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 2,
                    'name' => 'GLE Coupe',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 2,
                    'name' => 'A Class Sedan',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 2,
                    'name' => 'S Class Sedan',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 2,
                    'name' => 'Mercedes-AMG GT',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 3,
                    'name' => 'Audi A3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 3,
                    'name' => 'Audi A4',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 3,
                    'name' => 'Audi A5',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 3,
                    'name' => 'Audi Q3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 3,
                    'name' => 'Audi Q7',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 3,
                    'name' => 'Audi Q8',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 4,
                    'name' => '118i M Sport',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 4,
                    'name' => '220i',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 4,
                    'name' => '320i xDrive',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 4,
                    'name' => '740i',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 4,
                    'name' => 'xDrive20i',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 5,
                    'name' => '718 Cayman',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 5,
                    'name' => '718 Boxster',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 5,
                    'name' => '718 Cayman T',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'brand_id' => 5,
                    'name' => '718 Spyder',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}
