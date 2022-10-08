<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Dokumen;
use App\Models\User;
use App\Models\Perencanaan;
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
        User::factory(5)->create();
        Perencanaan::factory(10)->create();

        Admin::create([
            'admin' => 'Perencanaan'
        ]);

        Admin::create([
            'admin' => 'Pejabat Pembuat Komitmen'
        ]);

        Admin::create([
            'admin' => 'Keuangan'
        ]);

        Dokumen::create([
            'dokumen' => 'DIPA'
        ]);

        Dokumen::create([
            'dokumen' => 'RKKS'
        ]);

        Dokumen::create([
            'dokumen' => 'KAK'
        ]);

        Dokumen::create([
            'dokumen' => 'HPS'
        ]);

        Dokumen::create([
            'dokumen' => 'RAB'
        ]);

        Dokumen::create([
            'dokumen' => 'SP2D'
        ]);

        Dokumen::create([
            'dokumen' => 'Dokumen Perpajakan'
        ]);

        Dokumen::create([
            'dokumen' => 'Dokumen Pendaftaran'
        ]);

        Dokumen::create([
            'dokumen' => 'Judul'
        ]);

        Dokumen::create([
            'dokumen' => 'Adendum'
        ]);

        Dokumen::create([
            'dokumen' => 'NPWP'
        ]);

        Dokumen::create([
            'dokumen' => 'Dokumen Rekening'
        ]);

        Dokumen::create([
            'dokumen' => 'Dokumen Pengesahan'
        ]);
        
        Dokumen::create([
            'dokumen' => 'Pendaftaran Kontrak'
        ]);

        Dokumen::create([
            'dokumen' => 'Berita Acara Pemeriksaan'
        ]);

        Dokumen::create([
            'dokumen' => 'Berita Acara Administrasi'
        ]);

        Dokumen::create([
            'dokumen' => 'Berita Acara Pembayaran'
        ]);
    }
}
