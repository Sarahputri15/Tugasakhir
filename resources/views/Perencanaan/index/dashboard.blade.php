@extends('Perencanaan.layout.main')

@section('container')
<div class="row my-3 justify-content-start atur">
  <div class="col-2 card text-bg-secondary mx-3 bottom" style="width: 15rem; height:140px">
    <div class="card-header">Total Data</div>
    <div class="card-body">
      <h5 class="card-title">DIPA:</h5>
      <h5 class="card-text">{{ $hitung1 }}</h5>
    </div>
  </div>
  <div class="col-2 card text-bg-secondary mx-3 bottom" style="width: 15rem; height:140px">
    <div class="card-header">Total Data</div>
    <div class="card-body">
      <h5 class="card-title">RKKS:</h5>
      <h5 class="card-text">{{ $hitung2 }}</h5>
    </div>
  </div>
  <div class="col-2 card text-bg-secondary mx-3 bottom" style="width: 17rem; height:140px">
    <div class="card-header">Total Data:</div>
    <div class="card-body">
      <h5 class="card-title">Paket Barang dan Jasa</h5>
      <h5 class="card-text">{{ $hitung5 }}</h5>
    </div>
  </div>
</div>
<h3 class="mt-3">Tabel Paket Pengadaan Barang dan Jasa</h3>
<div class="row">
  <div class="col-12">
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3  border-bottom">
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
                  <a href="{{ url('/Home/pbj2/show/'.$p->id) }}" class="badge bg-info" target="_blank" >RAB</a>
                @endif
                @if($p->hps !== '')
                  <a href="{{ url('/Home/pbj2/show2/'.$p->id) }}" class="badge bg-info" target="_blank">HPS</a>
                @endif
                @if($p->kak !== '')
                  <a href="{{ url('/Home/pbj2/show3/'.$p->id) }}" class="badge bg-info" target="_blank">KAK</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection