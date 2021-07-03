<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert(
            [
                [
                    'product_id' => 1,
                    'category_id' => 1,
                ],
                [
                    'product_id' => 2,
                    'category_id' => 1,
                ]
            ]
        );
    }
}
