@extends('Perencanaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
<div class="row">
  <div class="col-9">
    <a href="{{ url('/Home/pbj2/print') }}" class="btn btn-success my-3" target="_blank"><i class="bi bi-printer"></i> Cetak</a>
  </div>
</div>

<div class="mb-1 me-0" style="float:right;">
  <form action="" method="get">
    <label for="tahun">Tahun Anggaran:</label> 
    <input type="date" class="border border-dark-subtle" name="date" id="date" value="{{ Request::get('date') ??date('Y-m-d') }}" style="width:150px; height:31px; border-radius:5px">
    <button class="border border-success bg-success text-white" type="submit" style="height:31px; border-radius:5px">Filter</button>
  </form>
</div>
<br>

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
        <th scope="col">Tanggal_update</th>
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
            <a href="{{ url('/Home/pbj2/show/'.$p->id) }}" class="badge bg-info" target="_blank">RAB</a>
          @endif
          @if($p->hps !== '')
            <a href="{{ url('/Home/pbj2/show2/'.$p->id) }}" class="badge bg-info" target="_blank">HPS</a>
          @endif
          @if($p->kak !== '')
            <a href="{{ url('/Home/pbj2/show3/'.$p->id) }}" class="badge bg-info" target="_blank">KAK</a>
          @endif
        </td>
        <td>{{ $p->created_at->format('d-m-Y') }}</td>
        <td>
          <a href="{{ url('/Home/pbj2/Edit/'.$p->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection