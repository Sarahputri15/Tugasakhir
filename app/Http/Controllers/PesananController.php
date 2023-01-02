<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Tahun;
use App\Models\Notif;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderStatusUpdated;
class PesananController extends Controller
{
    public function index() {
        $data['title'] = 'Surat Pesanan';
        $data['years'] = Tahun::all();
        $data['pesanan'] = Pesanan::latest()->where('tahun_id', Auth::user()->login_as)->get();
        return view('Pejabat_pengadaan.kontrak.pesanan', $data);
    }

    public function detail($id) {

        $data['title'] = 'Detail Surat Pesanan';
        $data['pesanan'] = Pesanan::where('id', $id)->first();
        $data['years'] = Tahun::all();
        return view('Pejabat_pengadaan.kontrak.detail', $data);
    }

    public function create() {
      $data['title'] = 'Surat Pesanan';
      $data['years'] = Auth::user()->login_as;
      return view('Pejabat_pengadaan.action.create', $data);
    }

    public function store(Request $request) {
      $pesanan = '';
      if($request->hasFile('pesanan')) {
          $file = $request->file('pesanan');
          $pesanan = 'Surat Pesanan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
          $file->move('file_pesanan', $pesanan);
      }

      $penawaran = '';
      if($request->hasFile('penawaran')) {
          $file = $request->file('penawaran');
          $penawaran = 'Dokumen Penawaran'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
          $file->move('file_pesanan', $penawaran);
      }
      Pesanan::create([
          'tahun_id' => $request->tahun,
          'judul' => $request->judul,
          'dok_pesanan' => $pesanan,
          'dok_penawaran' => $penawaran,
      ]);

      Notif::create([
        'IdUser' => Auth::user()->id,
        'deskripsi' => 'Menambah data surat pesanan'
      ]);
      event(new OrderStatusUpdated('Someone'));

      return redirect('pesanan');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Surat Pesanan';
        $data['pesanan'] = Pesanan::where('id', $id)->first();
        $data['years'] = Tahun::all();
        return view('Pejabat_pengadaan.action.edit', $data);
    }

    public function edit2(Request $request)
    {
        $edit = Pesanan::find($request->id);
        $edit->tahun_id = $request->tahun;
        $edit->judul = $request->judul;
        if($request->hasFile('penawaran')) {
            $file = $request->file('penawaran');
            $penawaran = 'Dokumen Penawaran'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pesanan', $penawaran);
            $edit->dok_penawaran = $penawaran;
        }

        if($request->hasFile('pesanan')) {
            $file = $request->file('pesanan');
            $pesanan = 'Surat Pesanan'.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $file->move('file_pesanan', $pesanan);
            $edit->dok_pesanan = $pesanan;
        }
        $edit->save();

        Notif::create([
            'IdUser' => Auth::user()->id,
            'deskripsi' => 'Mengubah data surat pesanan'
        ]);
        event(new OrderStatusUpdated('Someone'));
        return redirect('pesanan');
    }

    public function dashboard() 
    {
        $data['title'] = 'Dashboard';
        $data['hitung4'] = Pesanan::all()->where('tahun_id', Auth::user()->login_as)->count();
        $data['pesanan'] = Pesanan::all()->where('tahun_id', Auth::user()->login_as);
        return view('Pejabat_pengadaan.dashboard', $data);
    }

    public function show($id)
    {
        $data['title'] = 'Surat pesanan';
        $data['pesanan'] = Pesanan::where('id', $id)->first();
        return view('Pejabat_pengadaan.action.show', $data);
    }

    public function show2($id)
    {
        $data['title'] = 'Surat penawaran';
        $data['pesanan'] = Pesanan::where('id', $id)->first();
        return view('Pejabat_pengadaan.action.show2', $data);
    }

    //hapus data
    public function delete($id)
    {
        Pesanan::where('id',$id)->delete();

        return redirect('pesanan');
    }
}
