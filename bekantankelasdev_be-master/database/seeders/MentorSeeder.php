<?php

namespace Database\Seeders;

use App\Models\mentor;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mentor::create([
            'mentor_uuid'       => Str::uuid(),
            'mentor_fullname'   => '',
            'mentor_biodata'    => '',
            'mentor_foto'       => '',
        ]);
    }
}
