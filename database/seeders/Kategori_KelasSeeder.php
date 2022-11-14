<?php

namespace Database\Seeders;

use App\Models\kategori_kelas;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class Kategori_KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori_kelas::create([
            'kategori_kelas_uuid' => Str::uuid(),
            'kategori_kelas_nama' => '',
            'kategori_kelas_ket'  => '',
        ]);
    }
}
