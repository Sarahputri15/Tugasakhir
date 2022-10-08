@extends('Keuangan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }} : Detail</h1>
</div>
<a href="{{ url('Home/Pembayarankeu1') }}" class="btn btn-primary my-3"><i class="bi bi-chevron-left"></i> Kembali</a>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Nama Dokumen</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @if($keuangan->Dokumen_Judul == '')
            <th scope="row">1</th>
            <td>Dokumen Kontrak</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">1</th>
            <td>Dokumen Kontrak</td>
            <td>
              <a href="{{ URL::asset('file_pengadaan/'.$keuangan->Dokumen_Judul) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($euangan->Resume_kontrak == '')
            <th scope="row">1</th>
            <td>Resume Kontrak</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">1</th>
            <td>Resume Kontrak</td>
            <td>
              <a href="{{ URL::asset('file_pengadaan/'.$euangan->Resume_kontrak) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->Adendum == '')
            <th scope="row">2</th>
            <td>Addendum</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">2</th>
            <td>Addendum</td>
            <td>
              <a href="{{ URL::asset('file_pengadaan/'.$keuangan->Adendum) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->NPWP == '')
          <th scope="row">3</th>
            <td>NPWP</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">3</th>
            <td>NPWP</td>
            <td>          
              <a href="{{ URL::asset('file_pengadaan/'.$keuangan->NPWP) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->Dokumen_Rekening == '')
            <th scope="row">4</th>
            <td>Dokumen Rekening</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">4</th>
            <td>Dokumen Rekening</td>
            <td>          
              <a href="{{ URL::asset('file_pengadaan/'.$keuangan->Dokumen_Rekening) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->dok_pemeliharaan == '')
          <th scope="row">5</th>
            <td>Jaminan Pemeliharaan</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
          <th scope="row">5</th>
          <td>Jaminan Pemeliharaan</td>
          <td>
            <a href="{{ URL::asset('file_pengadaan/'.$keuangan->dok_pemeliharaan) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->jaminan_pelaksanaan_pekerjaan == '')
            <th scope="row">6</th>
            <td>Dokumen Jaminan Pekerjaan</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
          <th scope="row">6</th>
          <td>Dokumen Jaminan Pekerjaan</td>
          <td>
            <a href="{{ URL::asset('file_pengadaan/'.$keuangan->jaminan_pelaksanaan_pekerjaan) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          @endif
        </tr>

        <tr>
          @if($keuangan->jaminan_uang_muka == '')
            <th scope="row">7</th>
            <td>Jaminan Uang Muka</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
          <th scope="row">7</th>
          <td>Jaminan Uang Muka</td>
          <td>
            <a href="{{ URL::asset('file_pengadaan/'.$keuangan->jaminan_uang_muka) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->dok_akhir_tahun == '')
            <th scope="row">8</th>
            <td>Dokumen AKhir Tahun</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
          <th scope="row">8</th>
          <td>Dokumen Akhir Tahun</td>
          <td>
            <a href="{{ URL::asset('file_pengadaan/'.$keuangan->dok_akhir_tahun) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->Berita_Acara_Pemeriksaan == '')
            <th scope="row">9</th>
            <td>Berita Acara Pemeriksaan</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">9</th>
            <td>Berita Acara Pemerisksaan</td>
            <td>
              <a href="{{ URL::asset('file_pengadaan/'.$keuangan->Berita_Acara_Pemeriksaan) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->Berita_Acara_Administrasi == '')
            <th scope="row">10</th>
            <td>Berita Acara Administrasi</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
            <th scope="row">10</th>
            <td>Berita Acara Administrasi</td>
            <td>          
              <a href="{{ URL::asset('file_pengadaan/'.$keuangan->Berita_Acara_Administrasi) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
            </td>
          @endif
        </tr>
        <tr>
          @if($keuangan->Berita_Acara_Pembayaran == '')
            <th scope="row">11</th>
            <td>Berita Acara Pembayaran</td>
            <td><span class="text-danger"><i class="bi bi-exclamation-diamond-fill"></i> Dokumen belum ditambahkan</span></td>
          @else
          <th scope="row">11</th>
          <td>Berita Acara Pembayaran</td>
          <td>
            <a href="{{ URL::asset('file_pengadaan/'.$keuangan->Berita_Acara_Pembayaran) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
@endsection