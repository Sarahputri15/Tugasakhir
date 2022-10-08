@extends('KeyAdmin.layout.main')

@section('container')
<div class="container">
    <div class="row mt-3 mb-4 pb-2 justify-content-start border-bottom">
        <div class="col-2 card text-bg-success mx-3" style="width: 15rem; height:140px">
            <div class="card-header">Total Data</div>
            <div class="card-body">
              <h5 class="card-title">User</h5>
              <h5 class="card-text">{{ $sum }}</h5>
            </div>
          </div>
      </div>
      <h3 class="mt-3">Tabel Paket Pengadaan Barang dan Jasa</h3>
    <a href="{{ url('register') }}" class="btn btn-success my-3"><i class="bi bi-plus"></i>Tambah</a>
          <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3  border-bottom">
            <table class="table table-striped table-sm table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">no</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $u)
                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->nip }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->admin }}</td>
                    <td>{{ $u->password }}</td>
                    <td>
                      <a href="{{ url('user/edit/'.$u->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
                      <a href="{{ url('user/hapus/'.$u->id) }}" onclick="return confirm(' Apakah anda yakin ingin menghapus data ini? ')" class="badge bg-danger"><i class="bi bi-x-circle"></i> Hapus</span></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
</div>
@endsection