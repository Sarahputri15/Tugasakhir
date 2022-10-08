@extends('Keuangan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<table class="table table-striped table-sm table-bordered" id="myTable">
    <thead>
      <tr>
        <th scope="col" rowspan="2">no</th>
        <th scope="col" colspan="2">Kontrak</th>
        <th scope="col" rowspan="2">Penyedia</th>
        <th scope="col" rowspan="2">Nilai Kontrak</th>
        <th scope="col" rowspan="2">Status</th>
        <th scope="col" rowspan="2">Kode Akun</th>
        <th scope="col" rowspan="2">Nama Bank</th>
        <th scope="col" rowspan="2">Realisasi Pembayaran</th>
        <th scope="col" rowspan="2">SP2D</th>
        <th scope="col" rowspan="2">Dokumen Perpajakan</th>
        <th scope="col" rowspan="2">Action</th>
      </tr>
      <tr>
        <th scope="col">Judul Kontrak</th>
        <th scope="col">Detail</th>
      </tr>
    </thead>
    <tbody>
      @foreach($keuangans as $k)
      <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $k->judul }}</td>
        <td>
          <a href="{{ url('/Home/Pembayarankeu1/Detail/'.$k->id) }}" class="badge bg-info"><i class="bi bi-eye"></i> Detail</a>
        </td>
        <td>{{ $k->penyedia }}</td>
        <td>Rp.{{ number_format($k->nilai_kontrak, '0','.','.') }}</td>
        @if($k->status == 'Belum terdaftar')
        <td><span class="badge text-bg-danger">{{ $k->status }}</span></td>
        @else
        <td><span class="badge text-bg-success">{{ $k->status }}</span></td>
        @endif
        <td>{{ $k->akun }}</td>
        <td>{{ $k->bank }}</td>
        <td>Rp.{{ number_format($k->nilai_sp2d - $k->nilai_kontrak, '0','.','.') }}</td>
        <td>
          <a href="{{ url('/Home/Pembayarankeu1/sp2d/'.$k->id) }}" class="badge bg-info" ><i class="bi bi-eye"></i> Lihat</a>
        </td>
        <td>
          <a href="{{ url('/Home/Pembayarankeu1/perpajakan/'.$k->id) }}" class="badge bg-info"><i class="bi bi-eye"></i> Lihat</a>
        </td>
        <td>
          <a href="{{ url('/Home/Pembayarankeu1/Edit/'.$k->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection