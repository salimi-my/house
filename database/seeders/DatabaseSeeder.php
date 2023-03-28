<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Fahmi Mahfuz',
            'email' => 'fahmimahfuz@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Hilmi Narawi',
            'email' => 'hilminarawi@example.com',
        ]);

        \App\Models\Listing::factory(12)->create([
            'user_id' => 1
        ]);

        \App\Models\Listing::factory(12)->create([
            'user_id' => 2
        ]);

        $this->call([
            CountrySeeder::class
        ]);
    }
}
