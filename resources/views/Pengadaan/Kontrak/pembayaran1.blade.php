@extends('Pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
  <h1 class="h2">{{ $title }}</h1>
</div>

<div class="container">
  <div class="row">
    <div class="col-9">
      <a href="{{ url('/Home/Pembayaran1/Create') }}" class="btn btn-success my-3"><i class="bi bi-plus"></i>Tambah</a>
      <a href="{{ url('/Home/Pembayaran1/print') }}" class="btn btn-success my-3 ms-3"><i class="bi bi-printer"></i> Cetak</a>
    </div>
  </div>
</div>

<div class="row mb-1 me-0" style="float:right;">
  <form action="" method="get">
    <label for="tahun">Tahun Anggaran:</label> 
    <input type="date" class="border border-dark-subtle" name="date" id="date" value="{{ Request::get('date') ??date('Y-m-d') }}" style="width:150px; height:31px; border-radius:5px">
    <button class="border border-success bg-success text-white" type="submit" style="height:31px; border-radius:5px">Filter</button>
  </form>
</div>
<br>
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container-fluid"> 
<table class="table table-striped table-sm table-bordered" style="font-size: 14px;" id="myTable">
    <thead>
      <tr>
        <th scope="col" rowspan="2">no</th>
        <th scope="col" rowspan="2">Judul</th>
        <th scope="col" rowspan="2">Nomor Kontrak</th>
        <th scope="col" colspan="2">Masa Kontrak</th>
        <th scope="col" rowspan="2">Penyedia</th>
        <th scope="col" rowspan="2">Alamat</th>
        <th scope="col" rowspan="2">Nilai Kontrak</th>
        <th scope="col" rowspan="2">Kode Akun</th>
        <th scope="col" rowspan="2">Nama Bank</th>
        <th scope="col" rowspan="2">Status</th>
        <th scope="col" rowspan="2">Realisasi Pekerjaan</th>
        <th scope="col" rowspan="2">Realisasi Pembayaran</th>
        <th scope="col" rowspan="2">SP2D</th>
        <th scope="col" rowspan="2">Dokumen Perpajakan</th>
        <th scope="col" rowspan="2">Tanggal_update</th>
        <th scope="col" rowspan="2">Fitur</th>
      </tr>
      <th scope="col">Awal</th>
      <th scope="col">Akhir</th>
    </thead>
    <tbody>
      @foreach ($pembayarans as $pembayaran)
      <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $pembayaran->judul }}</td>
        <td>{{ $pembayaran->nomor_kontrak }}</td>
        <td>{{ $pembayaran->awal }}</td>
        <td>{{ $pembayaran->akhir }}</td>     
        <td>{{ $pembayaran->penyedia }}</td>
        <td>{{ $pembayaran->alamat }}</td>
        <td>Rp.{{ number_format($pembayaran->nilai_kontrak, '0','.','.') }}</td>
        <td>{{ $pembayaran->akun }}</td>
        <td>{{ $pembayaran->bank }}</td>

        @if($pembayaran->status == 'Belum terdaftar')
        <td><span class="badge text-bg-danger">{{ $pembayaran->status }}</span></td>
        @else
        <td><span class="badge text-bg-success">{{ $pembayaran->status }}</span></td>
        @endif

        <td>{{ $pembayaran->realisasi_pekerjaan }}</td>
        <td>Rp.{{ number_format($pembayaran->nilai_sp2d - $pembayaran->nilai_kontrak, '0','.','.') }}</td>
        <td>
            <a href="{{ url('/Home/Pembayaran1/Show/'.$pembayaran->id) }}" class="badge bg-info"><i class="bi bi-eye"></i> Lihat</a>
        </td>
        <td>
            <a href="{{ url('/Home/Pembayaran1/Show2/'.$pembayaran->id) }}" class="badge bg-info"><i class="bi bi-eye"></i> Lihat</a> 
        </td>
        <td>{{ $pembayaran->created_at->format('d-m-Y') }}</td>
        <td>
          <a href="{{ url('/Home/Pembayaran1/Detail/'.$pembayaran->id) }}" class="badge bg-info"><i class="bi bi-eye"></i> Detail</a>
          <a href="{{ url('/Home/Pembayaran1/Edit/'.$pembayaran->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
          <a href="{{ url('/Home/Pembayaran1/delete/'.$pembayaran->id) }}" onclick="return confirm(' Apakah anda yakin ingin menghapus data ini? ')" class="badge bg-danger"><i class="bi bi-x-circle"></i> Hapus</span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

