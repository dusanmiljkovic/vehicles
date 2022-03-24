<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('brands')->count() == 0) {

            DB::table('brands')->insert([
                [
                    'name' => 'Volkswagen',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Mercedes-Benz',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Audi',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'BMW',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Porsche',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}
