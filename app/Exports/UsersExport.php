<?php

namespace App\Exports;

use App\Models\Pengadaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengadaan::select('judul','nomor_kontrak','awal','akhir','penyedia','alamat','nilai_kontrak','akun','bank','status','realisasi_pekerjaan','realisasi_pembayaran')->get();
    }

    public function headings(): array
    {
        return [
        'Judul',
        'Nomor Kontrak',
        'Awal kontrak',
        'Akhir kontrak',
        'Penyedia',
        'Alamat',
        'Nilai Kontrak',
        'Kode Akun',
        'Nama Bank',
        'status',
        'Realisasi Pekerjaan',
        'Realisasi Pembayaran',
        ];
    }
}
