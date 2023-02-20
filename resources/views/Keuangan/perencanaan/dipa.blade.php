@extends('Keuangan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
  <h1 class="h2 ">{{ $title }}</h1>
</div>
<div class="mb-1" style="float:right; margin-right:13px">
  <form action="" method="get">
    <label for="tahun">Tahun Anggaran:</label> 
    <select class="border border-dark-subtle" name="years" id="tahun" style="width:150px; height:31px; border-radius:5px">
      <option value="pilih_tahun">-- Pilih Tahun --</option>
      @foreach($years as $y)
      <option value="{{ $y->id }}" {{ Request::get('years') == $y->id ? 'selected':'' }}>{{ $y->years }}</option>
      @endforeach
    </select>
    <button class="border border-success bg-success text-white" type="submit" style="height:31px; border-radius:5px">Filter</button>
  </form>
</div>
<br>
<div class="container">
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <table class="table table-striped table-sm table-bordered" id="myTable">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Dokumen</th>
          <th scope="col">Edisi</th>
          <th scope="col">Tanggal Upload</th>
          <th scope="col">Tanggal Pengesahan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($keuangans as $k)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $k->dokumen}}</td>
          <td>{{ $k->edisi }}</td>
          <td>{{ $k->updated_at }}</td>
          <td>{{ $k->tanggal_pengesahan }}</td>
          <td>
            <a href="{{ url('/Home/DIPA3/show/'.$k->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection