<?php

namespace App\Http\Controllers;
use App\Models\Perencanaan;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Models\pbj;
use App\Models\Notif;
use App\Models\Tahun;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderStatusUpdated;

//controller role user perencanaan
class RencanaController extends Controller
{
    //dashboard
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['pbj'] = pbj::latest()->where('tahun_id', Auth::user()->login_as)->get();
        $data['notif2'] = Notif::all();
        $data['hitung1'] = Perencanaan::where('dokumen_id','=', 1)->where('tahun_id', Auth::user()->login_as)->count();
        $data['hitung2'] = Perencanaan::where('dokumen_id','=', 2)->where('tahun_id', Auth::user()->login_as)->count();
        $data['hitung5'] = Pbj::all()->where('tahun_id', Auth::user()->login_as)->count();
        return view('Perencanaan.index.dashboard', $data);
    }

    //Tampilan halaman DIPA
    public function index() 
    {
        $search = Perencanaan::join('dokumens','perencanaans.Dokumen_id','=','dokumens.id');
        $data['title'] = 'DIPA';
        $data['years'] = Tahun::all();
        $data['perencanaan'] = $search->select('perencanaans.id','dokumens.dokumen','edisi','perencanaans.updated_at','tanggal_pengesahan')->where('dokumens.id', '=', 1)->where('tahun_id', Auth::user()->login_as)->orderBy('perencanaans.updated_at', 'DESC')->get();
        return view('Perencanaan.index.Dipa', $data);
        
    }

    //halaman tambah data DIPA
    public function create(Request $request)
    {
        $data['title'] = 'DIPA';
        $data['years'] = Auth::user()->login_as; 
        $data['dokumens'] = Dokumen::find($request->id=1);
        return view('Perencanaan.action.create', $data);
    }

    //tambah data DIPA
    public function store(Request $request) {
        $namafile = '';
        if($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $namafile = 'DIPA'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $namafile);
        }
        Perencanaan::create([
            'tahun_id' => $request->tahun,
            'Dokumen_id' => $request->dokumen_id,
            'edisi' => $request->edisi,
            'tanggal_pengesahan' => $request->pengesahan,
            'dokumen' => $namafile,
        ]);
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Menambahkan data DIPA'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/DIPA');
    }

    //hapus data DIPA
    public function delete($id)
    {
        Perencanaan::where('id',$id)->delete();

        return redirect('/Home/DIPA');
    }

    //tampilan dokumen DIPA
    public function show($id) 
    {
        $data['title'] = 'DIPA';
        $data['perencanaan'] = Perencanaan::where('id', $id)->first();
        $data['notif2'] = Notif::all();
        $data['dokumen'] = Dokumen::where('id', $data['perencanaan']->Dokumen_id)->first(); 
        return view('Perencanaan.action.show', $data);
    }

    //halaman edit data DIPA
    public function edit($id) 
    {
        $data['title'] = 'DIPA';
        $data['perencanaan'] = Perencanaan::where('id', $id)->first();
        $data['dokumens'] = Dokumen::all(); 
        $data['notif2'] = Notif::all();
        $data['years'] = Tahun::all();
        return view('Perencanaan.action.edit', $data);
    }

    //edit data DIPA
    public function edit_perencanaan(Request $request) 
    {
        $perencanaan = Perencanaan::find($request->id);
        $perencanaan->tahun_id = $request->tahun;
        $perencanaan->edisi = $request->edisi; 
        $perencanaan->tanggal_pengesahan = $request->pengesahan;
        //$perencanaan->tanggal_upload = $request->upload;
        if($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $namafile = 'DIPA'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $namafile);
            $perencanaan->dokumen = $namafile; 
        }
        $perencanaan->save();
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Mengubah data DIPA'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/DIPA');
    }

    //tampilan halaman pbj(perencanaan)
    public function index2() 
    {
        $data['title'] = 'Daftar Usulan PBJ';
        $data['pbj'] = pbj::latest()->where('tahun_id', Auth::user()->login_as)->get();
        $data['notif2'] = Notif::all();
        $data['years'] = Tahun::all();
        return view('Perencanaan.index.pbj', $data);
    }

    //tampilan dokumen rab
    public function show2($id) 
    {
        $data['title'] = 'RAB';
        $data['notif2'] = Notif::all();
        $data['pbj'] = pbj::where('id', $id)->first();
        return view('Perencanaan.action.show2', $data);
    }
 
    //tampilan dokumen HPS
    public function show3($id)
    {
        $data['title'] = 'HPS';
        $data['pbj'] = pbj::where('id', $id)->first();
        return view('Perencanaan.action.show3', $data);
    }

    //tampilan dokumen KAK
    public function show4($id)
    {
        $data['title'] = 'KAK';
        $data['pbj'] = pbj::where('id', $id)->first();
        return view('Perencanaan.action.show4', $data);
    }

    //halaman edit pbj(perencanaan)
    public function edit2($id) 
    {
        $data['title'] = 'Usulan Pemaketan PBJ';
        $data['pbj'] = pbj::where('id', $id)->first(); 
        return view('Perencanaan.action.edit2', $data);
    }

    //edit data pbj(perencanaan)
    public function edit3(Request $request) 
    {
        $pbj = pbj::find($request->id);
        $pbj->rup = $request->rup;
        $pbj->save();
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Mengubah data PBJ'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/pbj2');
    }

    //halaman print data pbj
    public function print() 
    {
        $data['title'] = 'Data PBJ';
        $data['pbj'] = pbj::where('tahun_id', Auth::user()->login_as)->get();
        return view('Perencanaan.index.print', $data);
    }

    //pengaturan notif
    public function index3() 
    {
        $data['title'] = 'RKKS';
        $data['years'] = Tahun::all();
        $data['perencanaan'] = Perencanaan::join('dokumens','perencanaans.Dokumen_id','=','dokumens.id')->select('perencanaans.id','dokumens.dokumen','edisi','perencanaans.updated_at','tanggal_pengesahan')->where('dokumens.id', '=', 2)->orderBy('perencanaans.updated_at', 'DESC')->get();
        return view('Perencanaan.index.RKKS', $data);
    }

    //halaman tambah data RKKS
    public function create2(Request $request)
    {
        $data['title'] = 'RKKS';
        $data['years'] = Auth::user()->login_as;
        $data['dokumens'] = Dokumen::find($request->id=2);
        return view('Perencanaan.action.create2', $data);

    }

    //tambah data RKKS
    public function store3(Request $request) {
        $namafile = '';
        if($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $namafile = 'RKKS'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $namafile);
        }
        Perencanaan::create([
            'tahun_id' => $request->tahun,
            'Dokumen_id' => $request->dokumen_id,
            'edisi' => $request->edisi,
            //'tanggal_upload' => $request->upload,
            'tanggal_pengesahan' => $request->pengesahan,
            'dokumen' => $namafile,
        ]);
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Menambahkan data RKKS'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/RKKS');
    }

    //hapus data RKKS
    public function delete2($id)
    {
        Perencanaan::where('id',$id)->delete();

        return redirect('/Home/RKKS');
    }

    //halaman dokumen RKKS
    public function show5($id) 
    {
        $data['title'] = 'RKKS';
        $data['perencanaan'] = Perencanaan::where('id', $id)->first();
        $data['dokumen'] = Dokumen::where('id', $data['perencanaan']->Dokumen_id)->first(); 
        return view('Perencanaan.action.show', $data);
    }

    //halaman edit data RKKS
    public function edit4($id) 
    {
        $data['title'] = 'RKKS';
        $data['perencanaan'] = Perencanaan::where('id', $id)->first();
        $data['dokumens'] = Dokumen::all(); 
        $data['years'] = Tahun::all();
        return view('Perencanaan.action.edit3', $data);
    }

    //edit data RKKS
    public function edit_perencanaan2(Request $request) 
    {
        $perencanaan = Perencanaan::find($request->id);
        $perencanaan->tahun_id = $request->tahun;
        $perencanaan->edisi = $request->edisi; 
        $perencanaan->tanggal_pengesahan = $request->pengesahan;
       // $perencanaan->tanggal_upload = $request->upload;
        if($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $namafile = 'RKKS'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_perencanaan', $namafile);
            $perencanaan->dokumen = $namafile;
        }
        $perencanaan->save();
        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Mengubah data RKKS'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('/Home/RKKS');
    }

    public function getnotif(Request $request)
    {
        $id = $request->admin_id;
        if($id == '1'){
            return  Notif::leftJoin('users', 'users.id', '=', 'notifs.IdUser')->where('notifs.deskripsi', 'like', '%DIPA%')->orWhere('notifs.deskripsi', 'like', '%PBJ%')->orWhere('notifs.deskripsi', 'like', '%RKKS%')->select('users.name','notifs.*')->take(5)->orderBy('notifs.created_at', 'DESC')->get();
        }elseif($id == '2'){
            return  Notif::leftJoin('users', 'users.id', '=', 'notifs.IdUser')->where('notifs.deskripsi', 'like', '%DIPA%')->orWhere('notifs.deskripsi', 'like', '%PBJ%')->orWhere('notifs.deskripsi', 'like', '%RKKS%')->orWhere('notifs.deskripsi', 'like', '%kontrak%')->orWhere('notifs.deskripsi', 'like', '%pesanan%')->select('users.name','notifs.*')->take(5)->orderBy('notifs.created_at', 'DESC')->get();
        }elseif($id == '3'){
            return  Notif::leftJoin('users', 'users.id', '=', 'notifs.IdUser')->where('notifs.deskripsi', 'like', '%kontrak%')->select('users.name','notifs.*')->take(5)->orderBy('notifs.created_at', 'DESC')->get();
        }elseif($id == '4'){
            return  Notif::leftJoin('users', 'users.id', '=', 'notifs.IdUser')->where('notifs.deskripsi', 'like', '%pesanan%')->select('users.name','notifs.*')->take(5)->orderBy('notifs.created_at', 'DESC')->get();   
        }else{
            return  Notif::leftJoin('users', 'users.id', '=', 'notifs.IdUser')->select('users.name','notifs.*')->take(5)->orderBy('notifs.created_at', 'DESC')->get();
        }
        
    }
} 

