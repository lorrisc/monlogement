<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypesTableSeeder extends Seeder
{
    static $libpropertytypes = [
        'Maison',
        'Appartement',
        'Parking/box',
        'Terrain',
        'Loft/atelier/surface',
        'Fonds de commerce',
        'Bâtiments/immeuble',
        'Château',
        'Local commercial',
        'Bureaux',
        'Hôtel particulier',
        'Autres'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$libpropertytypes as $libpropertytype) {
            DB::table('property_types')->insert([
                'lib_property_type' => $libpropertytype
            ]);
        }
    }
}
