<?php

namespace Database\Seeders;

use App\Models\level_kelas;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Level_KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        level_kelas::create([
            'level_kelas_uuid' => Str::uuid(),
            'level_kelas_name' => '',
            'level_kelas_ket'  => '',
        ]);
    }
}
