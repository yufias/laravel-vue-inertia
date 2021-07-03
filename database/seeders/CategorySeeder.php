<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
            [
                [
                    'category_name' => 'processor',
                ],
                [
                    'category_name' => 'motherboard',
                ],
                [
                    'category_name' => 'ram',
                ],
                [
                    'category_name' => 'psu',
                ]
            ]
        );
    }
}
