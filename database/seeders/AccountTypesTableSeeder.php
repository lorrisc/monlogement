<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypesTableSeeder extends Seeder
{
    static $accounttypes = [
        'professionnel',
        'particulier'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$accounttypes as $accounttype) {
            DB::table('account_types')->insert([
                'lib_account_type' => $accounttype
            ]);
        }
    }
}
