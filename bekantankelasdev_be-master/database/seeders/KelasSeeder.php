<?php

namespace Database\Seeders;

use App\Models\kelas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kelas::create([
            'kelas_uuid' => Str::uuid(),
            'kelas_nama' => '',
            'kelas_jumlahpeserta'  => '',
            'kelas_kategori'  => '',
            'kelas_jenis'  => '',
            'kelas_level'  => '',
            'kelas_mentor'  => '',
            'kelas_kategori '  => '',
        ]);
    }
}
