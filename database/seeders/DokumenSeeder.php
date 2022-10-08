<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokumen;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokumen::create([
            'dokumen' => 'DIPA'
        ]);

        Dokumen::create([
            'dokumen' => 'RKKS'
        ]);
    }
}
