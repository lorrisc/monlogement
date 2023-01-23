<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTypesTableSeeder extends Seeder
{
    static $posttypes = [
        'location',
        'vente'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$posttypes as $posttype) {
            DB::table('post_types')->insert([
                'lib_post_type' => $posttype
            ]);
        }
    }
}
