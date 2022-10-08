<?php

namespace App\Http\Controllers;
use App\Models\Perencanaan;
use App\models\pbj;
use App\Models\Pengadaan;
use App\Models\Notif;
use App\Models\Tahun;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderStatusUpdated;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

//Controller role PPK
class PengadaanController extends Controller
{
    //Halaman dashboard
    public function dashboard() 
    {
        $sum_pekerjaan = Pengadaan::all()->where('tahun_id', Auth::user()->login_as)->sum('realisasi_pekerjaan');
        $pekerjaan = Pengadaan::all()->where('tahun_id', Auth::user()->login_as)->count();
        $data['pekerjaan'] = $sum_pekerjaan/$pekerjaan;
        $pembayaran = pengadaan::all()->where('tahun_id', Auth::user()->login_as);
        $hitung = 0;
        foreach($pembayaran as $p)
        {
            if($p->nilai_sp2d != '' && $p->nilai_kontrak != '')
            {
                if($p->nilai_sp2d > $p->nilai_kontrak)
                {
                    $hitung += $p->nilai_sp2d - $p->nilai_kontrak;
                }
            }
        }
        //$sum_pembayaran = Pengadaan::all()->sum('realisasi_pembayaran');
        $data['pembayaran'] = $hitung;
        $data['hitung1'] = Perencanaan::where('dokumen_id','=', 1)->where('tahun_id', Auth::user()->login_as)->count();
        $data['hitung2'] = Perencanaan::where('dokumen_id','=', 2)->where('tahun_id', Auth::user()->login_as)->count();
        $data['hitung3'] = Pengadaan::all()->where('tahun_id', Auth::user()->login_as)->count();
        $data['hitung4'] = Pesanan::all()->where('tahun_id', Auth::user()->login_as)->count();
        $data['hitung5'] = Pbj::all()->where('tahun_id', Auth::user()->login_as)->count();
        $data['pengadaan'] = Pengadaan::all()->where('tahun_id', Auth::user()->login_as);
        $data['current'] = Carbon::now();
        $data['title'] = 'Dashboard';
        return view('.Pengadaan.dashboard.dahboard', $data);
    }

    //Halaman DIPA
    public function index() 
    {
        $data['title'] = 'DIPA';
        $data['perencanaan'] = Perencanaan::join('dokumens','perencanaans.Dokumen_id','=','dokumens.id')->select('perencanaans.id','dokumens.dokumen','edisi','perencanaans.updated_at','tanggal_pengesahan')->where('dokumens.id', '=', 1)->where('tahun_id', Auth::user()->login_as)->get();
        $data['years'] = Tahun::all();
        return view('Pengadaan.Perencanaan.Dipa', $data);
    }

    //Halaman dokumen DIPA
    public function show($id) 
    {
        $data['title'] = 'DIPA';
        $data['rencanaan'] = Perencanaan::where('id', $id)->first();
        return view('Pengadaan.action.show', $data);
    }

    //Halaman RKKS
    public function index2() 
    {
        $data['title'] = 'RKKS';
        $data['perencanaan'] = Perencanaan::join('dokumens','perencanaans.Dokumen_id','=','dokumens.id')->select('perencanaans.id','dokumens.dokumen','edisi','perencanaans.updated_at','tanggal_pengesahan')->where('dokumens.id', '=', 2)->where('tahun_id', Auth::user()->login_as)->get();
        $data['years'] = Tahun::all();
        return view('Pengadaan.Perencanaan.RKKS', $data);
    }

    //Halaman dokumen RKKS
    public function show2($id) 
    {
        $data['title'] = 'RKKS';
        $data['rencanaan'] = Perencanaan::where('id', $id)->first();
        return view('Pengadaan.action.show', $data);
    }

    //halaman PBJ(pengadaan)
    public function index5() 
    {
        $data['title'] = 'Daftar Usulan Pemaketan';
        $data['pbj'] = pbj::latest()->where('tahun_id', Auth::user()->login_as)->get();
        $data['years'] = Tahun::all();
        return view('Pengadaan.Perencanaan.pbj', $data);
    }

    //Halaman tambah data PBJ
    public function create2()
    {
        $data['title'] = 'Usulan Pemaketan PBJ';
        $data['years'] = Tahun::all();
        return view('Pengadaan.action.create2', $data);
    }

    //Tambah data PBJ
    public function store2(Request $request) {
        $rab = '';
        if($request->hasFile('rab')) {
            $file = $request->file('rab');
            $rab = 'RAB'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $rab);
        }

        $hps = '';
        if($request->hasFile('hps')) {
            $file = $request->file('hps');
            $hps = 'HPS'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $hps);
        }

        $kak = '';
        if($request->hasFile('kak')) {
            $file = $request->file('kak');
            $kak = 'KAK'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $kak);
        }
        pbj::create([
            'tahun_id' => $request->tahun,
            'paket' => $request->paket,
            'rup' => $request->rup,
            'mak' => $request->mak,
            'pagu' => $request->pagu,
            'metode' => $request->metode,
            'rab' => $rab,
            'hps' => $hps,
            'kak' => $kak,
        ]);
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Menambahkan data PBJ'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/pbj');
    }

    //hapus data PBJ
    public function delete2($id)
    {
        pbj::where('id',$id)->delete();

        return redirect('/Home/pbj');
    }

    //menampilkan dokumen RAB
    public function show4($id) 
    {
        $data['title'] = 'RAB';
        $data['pbj'] = pbj::where('id', $id)->first();
        return view('Pengadaan.action.show2', $data);
    }
 
    //menampilkan dokumen HPS
    public function show5($id)
    {
        $data['title'] = 'HPS';
        $data['pbj'] = pbj::where('id', $id)->first();
        return view('Pengadaan.action.show3', $data);
    }

    //menampilkan dokumen KAK
    public function show6($id)
    {
        $data['title'] = 'KAK';
        $data['pbj'] = pbj::where('id', $id)->first();
        return view('Pengadaan.action.show4', $data);
    }

    //halaman edit data
    public function edit4($id) 
    {
        $data['title'] = 'Usulan Pemaketan PBJ';
        $data['paket'] = pbj::where('id', $id)->first(); 
        $data['years'] = Tahun::all();
        return view('Pengadaan.action.edit3', $data);
    }

    //edit data PBJ
    public function edit5(Request $request) 
    {
        $pbj = pbj::find($request->id);
        $pbj->tahun_id = $request->tahun;
        $pbj->paket = $request->paket; 
        $pbj->mak = $request->ak;
        $pbj->pagu = $request->agu;
        $pbj->metode = $request->etode;
        
        if($request->hasFile('rab')) {
            $file = $request->file('rab');
            $rab = 'RAB'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $rab);
            $pbj->rab = $rab;
        }

        if($request->hasFile('hps')) {
            $file = $request->file('hps');
            $hps = 'HPS'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $hps);
            $pbj->hps = $hps;
        }

        if($request->hasFile('kak')) {
            $file = $request->file('kak');
            $kak = 'KAK'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $kak);
            $pbj->kak = $kak;
        }
        $pbj->save();
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Mengubah data PBJ'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/pbj');
    }

    //Halaman cetak data PBJ
    public function print() 
    {
        $data['title'] = 'Data PBJ';
        $data['pbj'] = pbj::all()->where('tahun_id', Auth::user()->login_as);
        return view('Pengadaan.Perencanaan.print', $data);
    }

    //Halaman persiapan kontrak
    public function index4() 
    {
        $data['title'] = 'Persiapan Kontrak';
        $data['pembayarans'] = Pengadaan::latest()->where('tahun_id', Auth::user()->login_as)->get();
        $data['years'] = Tahun::all();
        return view('Pengadaan.Kontrak.pembayaran1', $data);
    }

     //tambah data
     public function store(Request $request) 
     {
         $judul ='';
         if($request->hasFile('judul')) {
             $file = $request->file('judul');
             $judul = 'Dokumen Judul '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $judul);
         }

         $resume = '';
 
         if($request->hasFile('resume')) {
             $file = $request->file('resume');
             $resume = 'Resume_Kontrak'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $resume);
         }
          
         $adendum = '';
 
         if($request->hasFile('adendum')) {
             $file = $request->file('adendum');
             $adendum = 'Addendum'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $adendum);
         }
 
         $npwp = '';
 
         if($request->hasFile('npwp')) {
             $file = $request->file('npwp');
             $npwp = 'NPWP'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $npwp);
         }
 
         $rekening = '';
 
         if($request->hasFile('rekening')) {
             $file = $request->file('rekening');
             $rekening = 'rekening'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $rekening);
         }
 
         $pemeriksaan ='';
 
         if($request->hasFile('pemeriksaan')) {
             $file = $request->file('pemeriksaan');
             $pemeriksaan = 'Pemeriksaan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $pemeriksaan);
         }
 
         $administrasi = '';
 
         if($request->hasFile('administrasi')) {
             $file = $request->file('administrasi');
             $administrasi = 'Administrasi '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $administrasi);
         }
 
         $pembayaran = '';
 
         if($request->hasFile('pembayaran')) {
             $file = $request->file('pembayaran');
             $pembayaran = 'Pembayaran'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $pembayaran);
         }
 
         $pemeliharaan = '';
 
         if($request->hasFile('pemeliharaan')) {
             $file = $request->file('pemeliharaan');
             $pemeliharaan = 'Dokumen Pemeliharaan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $pemeliharaan);
         }
 
         $pekerjaan = '';
 
         if($request->hasFile('pekerjaan')) {
             $file = $request->file('pekerjaan');
             $pekerjaan = 'Dokumen Jaminan Pelaksanaan Pekerjaan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $pekerjaan);
         }
 
         $muka = '';
 
         if($request->hasFile('muka')) {
             $file = $request->file('muka');
             $muka = 'Dokumen Jaminan Uang Muka'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $muka);
         }
 
         $dat = '';
 
         if($request->hasFile('dat')) {
             $file = $request->file('dat');
             $dat = 'Dokumen Akhir Tahun'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
             $file->move('file_pengadaan', $dat);
         }

         Pengadaan::create([
             'tahun_id' => $request->tahun,
             'nomor_kontrak' => $request->nomor,
             'judul' => $request->title,
             'awal' => $request->awal,
             'akhir' => $request->akhir,
             'penyedia' => $request->penyedia,
             'alamat' => $request->alamat,
             'nilai_kontrak' => $request->nilai,
             'akun' => $request->akun,
             'bank' => $request->bank,
             'realisasi_pekerjaan' => $request->real_pekerjaan,
             //'realisasi_pembayaran' => $request->nilai,
             'Dokumen_Judul' => $judul,
             'Resume_kontrak' => $resume,
             'Adendum' => $adendum,
             'NPWP' => $npwp,
             'no_NPWP' => $request->no_npwp,
             'Dokumen_Rekening' => $rekening,
             'no_rekening' => $request->no_rekening,
             'Berita_Acara_Pemeriksaan' => $pemeriksaan,
             'Berita_Acara_Administrasi' => $administrasi,
             'Berita_Acara_Pembayaran' => $pembayaran,
             'dok_pemeliharaan' => $pemeliharaan,
             'jaminan_pelaksanaan_pekerjaan' => $pekerjaan,
             'jaminan_uang_muka' => $muka,
             'dok_akhir_tahun' => $dat,
         ]);
         Notif::create([
             'IdUser' => Auth::user()->id,
             'deskripsi' => 'Menambahkan data persiapan kontrak'
         ]);
         event(new OrderStatusUpdated('Someone'));
         return redirect('/Home/Pembayaran1');
     } 
    
    //Halaman tampilan dokumen
    public function show3($id) 
    {
        $data['title'] = 'SP2D';
        $data['rencanaan'] = Pengadaan::where('id', $id)->first();
        return view('Pengadaan.action.show7', $data);
    }

        //Halaman tampilan dokumen
    public function show9($id) 
    {
        $data['title'] = 'Perpajakan';
        $data['rencanaan'] = Pengadaan::where('id', $id)->first();
        return view('Pengadaan.action.show8', $data);
    }

    //Halaman tambah data
    public function create() {
        $data['title'] = 'Persiapan Kontrak';
        $data['years'] = Tahun::all();
        return view('Pengadaan.action.create', $data);
    }

    //Halaman edit data
    public function edit2($id) 
    {
        $data['edit'] = Pengadaan::where('id', $id)->first();
        $data['title'] = 'Persiapan Kontrak';
        $data['years'] = Tahun::all();
        return view('Pengadaan.action.edit',$data);
    }

    //Edit data
    public function edit3(Request $request)
    {
        $edit = Pengadaan::find($request->id);
        $edit->tahun_id = $request->tahun;
        $edit->nomor_kontrak = $request->nomor;
        $edit->judul = $request->title;
        $edit->awal = $request->awal;
        $edit->akhir = $request->akhir;
        $edit->penyedia = $request->penyedia;
        $edit->alamat = $request->alamat;
        $edit->nilai_kontrak = $request->nilai;
        $edit->akun = $request->akun;
        $edit->bank = $request->bank;
        $edit->realisasi_pekerjaan = $request->real_pekerjaan;

        if($request->hasFile('judul')) {
            $file = $request->file('judul');
            $judul = 'Dokumen Judul '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $judul);
            $edit->Dokumen_Judul = $judul;
        }

        if($request->hasFile('resume')) {
            $file = $request->file('resume');
            $resume = 'Resume_Kontrak '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $resume);
            $edit->Resume_kontrak = $resume;
        }

        if($request->hasFile('adendum')) {
            $file = $request->file('adendum');
            $adendum = 'Adendum'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $adendum);
            $edit->Adendum = $adendum;
        }

        if($request->hasFile('npwp')) {
            $file = $request->file('npwp');
            $npwp = 'NPWP'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $npwp);
            $edit->NPWP = $npwp;
        }

        if($request->hasFile('rekening')) {
            $file = $request->file('rekening');
            $rekening = 'rekening'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $rekening);
            $edit->Dokumen_Rekening = $rekening;
        }

        if($request->hasFile('pemeriksaan')) {
            $file = $request->file('pemeriksaan');
            $pemeriksaan = 'Pemeriksaan '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $pemeriksaan);
            $edit->Berita_Acara_Pemeriksaan = $pemeriksaan;
        }

        if($request->hasFile('administrasi')) {
            $file = $request->file('administrasi');
            $administrasi = 'Administrasi '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $administrasi);
            $edit->Berita_Acara_Administrasi = $administrasi;
        }

        if($request->hasFile('pembayaran')) {
            $file = $request->file('pembayaran');
            $pembayaran = 'Pembayaran'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $pembayaran);
            $edit->Berita_Acara_Pembayaran = $pembayaran;
        } 

        if($request->hasFile('pemeliharaan')) {
            $file = $request->file('pemeliharaan');
            $pemeliharaan = 'Dokumen Pemeliharaan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $pemeliharaan);
            $edit->dok_pemeliharaan = $pemeliharaan;
        }

        if($request->hasFile('pekerjaan')) {
            $file = $request->file('pekerjaan');
            $pekerjaan = 'Dokumen Jaminan Pelaksanaan Pekerjaan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $pekerjaan);
            $edit->jaminan_pelaksanaan_pekerjaan = $pekerjaan;
        }

        if($request->hasFile('muka')) {
            $file = $request->file('muka');
            $muka = 'Dokumen Jaminan Uang Muka'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $muka);
            $edit->jaminan_uang_muka = $muka;
        }

        if($request->hasFile('dat')) {
            $file = $request->file('dat');
            $dat = 'Dokumen Akhir Tahun'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pengadaan', $dat);
            $edit->dok_akhir_tahun = $dat;
        }
        $edit->save();
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Mengubah data persiapan kontrak'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/Pembayaran1');
    }

    //Hapus data
    public function delete($id)
    {
        Pengadaan::where('id',$id)->delete();
        return redirect('/Home/Pembayaran1');
    }

    //Halaman detail data
    public function detail2($id) 
    {
        $data['pengadaan'] = Pengadaan::where('id', $id)->first();
        $data['title'] = 'Persiapan Kontrak';
        return view('.Pengadaan.Detail.pengadaan.index', $data);
    }

    //Fitur export excel
    public function export() 
    {
        return Excel::download(new UsersExport, 'Pengadaan.xlsx');
    }


    //surat pesanan
    public function index3() 
    {
      $data['title'] = 'Surat Pesanan';
      $data['perencanaan'] = Pesanan::latest()->where('tahun_id', Auth::user()->login_as)->get();
      $data['years'] = Tahun::all();
      return view('Pengadaan.Kontrak.pesanan', $data);
    }
    public function detail($id)
    {
      $data['title'] = 'Detail Surat Pesanan';
      $data['title2'] = 'Pengesahan';
      $data['pesanan'] = Pesanan::where('id', $id)->first();
      $data['years'] = Tahun::all();
      return view('Pengadaan.Detail.pengadaan.pesanan', $data);
    }

    public function edit(Request $request)
    {
      $pesanan = Pesanan::find($request->id);
      $pesanan->status = $request->status;
      $pesanan->catatan = $request->catatan;
      $pesanan->save();

      Notif::create([
        'IdUser' => Auth::user()->id,
        'deskripsi' => 'Mengubah data surat pesanan'
      ]);
      event(new OrderStatusUpdated('Someone'));
      return redirect('/Home/pesanan');
    }
    public function show7($id)
    {
      $data['title'] = 'Surat pesanan';
      $data['pesanan'] = Pesanan::where('id', $id)->first();
      return view('Pengadaan.action.show5', $data);
    }

    public function show8($id)
    {
      $data['title'] = 'Surat penawaran';
      $data['pesanan'] = Pesanan::where('id', $id)->first();
      return view('Pengadaan.action.show6', $data);
    }
}

