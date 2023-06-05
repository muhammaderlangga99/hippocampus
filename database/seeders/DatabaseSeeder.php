<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Categori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'hiddenadmin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('muhammad'),
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        Categori::create([
            'id' => 1,
            'name' => '-',
            'slug' => '-',
            'image' => '-',
        ]);


        // \App\Models\Items::factory(50)->create();
        // Categori::factory(4)->create();
        // \App\Models\Contact::factory(20)->create();
    }
}
