<?php

namespace Database\Seeders;

use App\Models\jenis_kelas;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Jenis_KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jenis_kelas::create([
            'jenis_kelas_uuid' => Str::uuid(),
            'jenis_kelas_name' => '',
            'jenis_kelas_ket'  => '',
        ]);
    }
}
