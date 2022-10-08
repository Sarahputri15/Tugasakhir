@extends('Pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
    <h1 class="h2">{{ $title }}</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-9">
      <a href="{{ url('/Home/pbj/Create') }}" class="btn btn-success my-3"><i class="bi bi-plus"></i>Tambah</a>
      <a href="{{ url('/Home/pbj/print') }}" class="btn btn-success my-3" target="_blank"><i class="bi bi-printer"></i> Cetak</a>
    </div>
  </div>
      
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <table class="table table-striped table-sm table-bordered" id="myTable">
      <thead>
        <tr>
          <th class="col-1" scope="col">no</th>
          <th scope="col">Paket PBJ</th>
          <th scope="col">ID RUP</th>
          <th scope="col">MAK</th>
          <th scope="col">Pagu</th>
          <th scope="col">Metode Pengadaan</th>
          <th scope="col">Dokumen</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pbj as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->paket }}</td>
          <td>{{ $p->rup }}</td>
          <td>{{ $p->mak }}</td>
          <td>Rp.{{ number_format($p->pagu, '0','.','.') }}</td>
          <td>{{ $p->metode }}</td>
          <td>
            @if($p->rab !== '')
              <a href="{{ url('/Home/pbj/show/'.$p->id) }}" class="badge bg-info" target="_blank">RAB</a>
            @endif
            @if($p->hps !== '')
              <a href="{{ url('/Home/pbj/show2/'.$p->id) }}" class="badge bg-info" target="_blank">HPS</a>
            @endif
            @if($p->kak !== '')
              <a href="{{ url('/Home/pbj/show3/'.$p->id) }}" class="badge bg-info" target="_blank">KAK</a>
            @endif
          </td>
          <td>
            <a href="{{ url('/Home/pbj/Edit/'.$p->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
            <a href="{{ url('/Home/pbj/delete/'.$p->id) }}" class="badge bg-danger" onclick="return confirm(' Apakah anda yakin ingin menghapus data ini? ')"><i class="bi bi-x-circle"></i> Hapus</span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  @endsection