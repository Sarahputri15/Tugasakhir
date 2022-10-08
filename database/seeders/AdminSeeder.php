<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'admin' => 'Koordinator Rukun Perencanaan'
        ]);

        Admin::create([
            'admin' => 'Pejabat Pembuat Komitmen'
        ]);

        Admin::create([
            'admin' => 'Koordinator Rukun Keuangan'
        ]);

        Admin::create([
            'admin' => 'Pejabat Pengadaan'
        ]);

    }
}
