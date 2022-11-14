<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RoleSeeder::class);
        $this->call(Kategori_KelasSeeder::class);
        $this->call(Level_KelasSeeder::class);
        $this->call(Jenis_KelasSeeder::class);
        $this->call(MentorSeeder::class);

    }
}
