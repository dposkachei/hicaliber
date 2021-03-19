<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(database_path('seeders/property-data.csv')));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);

        foreach ($csv as $value) {
            if (!isset($value['Name'])) {
                continue;
            }
            Listing::factory()->create([
                'title' => $value['Name'],
                'price' => $value['Price'] ?? 0,
                'bedrooms' => $value['Bedrooms'] ?? 0,
                'bathrooms' => $value['Bathrooms'] ?? 0,
                'storeys' => $value['Storeys'] ?? 0,
                'garages' => $value['Garages'] ?? 0,
            ]);
        }
    }
}
