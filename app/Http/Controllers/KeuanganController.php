<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\Perencanaan;
use App\Models\Tahun;
use App\Models\Notif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderStatusUpdated;

//controller role keuangan
class KeuanganController extends Controller
{
    //Dashboard
    public function dashboard() 
    {
      $sum_pekerjaan = Pengadaan::all()->sum('realisasi_pekerjaan');
      $pekerjaan = Pengadaan::all()->count();
      $data['pekerjaan'] = $sum_pekerjaan/$pekerjaan;
      $pembayaran = pengadaan::all();
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
      $data['pembayaran'] = Pengadaan::all()->sum('realisasi_pembayaran');
      $data['pembayaran'] = $hitung;
      $data['current'] = Carbon::now();
      $data['title'] = 'Dashboard';
      $data['keuangans'] = Pengadaan::latest()->get();
      $data['hitung3'] = Pengadaan::all()->count();
      return view('Keuangan.dashboard.dashboard', $data);
    }

        //Halaman persiapan kontrak
        public function index(Request  $request) 
        {
            $data['title']='Persiapan Kontrak';
            $data['keuangans'] = Pengadaan::latest()->get();
            $data['years'] = Tahun::all();
            $date = Carbon::now()->format('Y-m-d');

            if($request->date){
                $data['keuangans'] = Pengadaan::when($request->date !== Null, function ($q) use ($request) {
                    return $q->whereDate('created_at', $request->date);
                }, function($q) use ($date ){
                    return $q->whereDate('created_at', $date );
                })->get();
            }
            return view('Keuangan.Kontrak.pembayaran1',$data);
        }
    
        //Halaman edit data
        public function edit($id) 
        {
            $data['title'] = 'Persiapan Kontrak';
            $data['keuangan'] = Pengadaan::where('id', $id)->first();
            $data['years'] = Tahun::all();
            return view('Keuangan.action.edit',$data);
        }
    
        //edit data
        public function edit2(Request $request) 
        {
            $edit = Pengadaan::find($request->id);
            $edit->status = $request->status;
            $edit->nilai_sp2d = $request->no_sp2d;
            //$edit->realisasi_pembayaran = $request->no_sp2d - $edit->nilai_kontrak;
            
            if($request->hasFile('sp2d')) {
                $file = $request->file('sp2d');
                $sp2d = 'SP2D '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
                $file->move('file_pengadaan', $sp2d);
                $edit->sp2d = $sp2d;
            }
    
            if($request->hasFile('perpajakan')) {
                $file = $request->file('perpajakan');
                $perpajakan = 'Perpajakan '.round(microtime(true)).'.'.$file->getClientOriginalExtension();
                $file->move('file_pengadaan', $perpajakan);
                $edit->dokumen_perpajakan = $perpajakan;
            }
           
            $edit->save();
            Notif::create([
                'IdUser' => Auth::user()->id,
                'deskripsi' => 'Mengubah data Persiapan Kontrak'
            ]);
            event(new OrderStatusUpdated('Someone'));
            return redirect('/Home/Pembayarankeu1');
        }
    
        //Halaman detail data
        public function detail($id) {
            $data['title'] = 'Persiapan Kontrak';
            $data['keuangan'] = Pengadaan::where('id', $id)->first();
            return view('.Keuangan.Detail.pengadaan.index',$data);
        }
    
        //halaman sp2d
        public function sp2d($id) 
        {
            $data['title'] = 'Persiapan Kontrak';
            $data['keuangan'] = Pengadaan::where('id', $id)->first();
            return view('Keuangan.Detail.pengadaan.sp2d',$data);
        }
    
        //halaman perpajakan
        public function perpajakan($id) 
        {
            $data['title'] = 'Persiapan Kontrak';
            $data['keuangan'] = Pengadaan::where('id', $id)->first();
            return view('Keuangan.Detail.pengadaan.perpajakan',$data);
        }
    
        //halaman sp2d
        public function pengesahan($id) 
        {
            $data['title'] = 'Persiapan Kontrak';
            $data['keuangan'] = Pengadaan::where('id', $id)->first();
            return view('Keuangan.Detail.pengadaan.pengesahan',$data);
        }

        public function index2(Request $request) 
        {
            $data['title'] = 'DIPA';
            $search = Perencanaan::join('dokumens','perencanaans.Dokumen_id','=','dokumens.id')->join('tahuns','perencanaans.tahun_id','=','tahuns.id');;
            $data['years'] = Tahun::all();
            $data['keuangans'] = $search->select('perencanaans.id','tahuns.years','dokumens.dokumen','edisi','perencanaans.updated_at','tanggal_pengesahan')->where('dokumens.id', '=', 1)->orderBy('perencanaans.updated_at', 'DESC')->get();
    
            if ($request->years) {
                $data['keuangans'] = $search->select('perencanaans.id', 'tahuns.years', 'dokumens.dokumen', 'edisi', 'perencanaans.updated_at', 'tanggal_pengesahan')->where('dokumens.id', '=', 1)->where('tahun_id', $request->years)->orderBy('perencanaans.updated_at', 'DESC')->get();
            }
            return view('Keuangan.perencanaan.dipa',$data);
        }

        public function showDipa($id) 
        {
            $data['title'] = 'DIPA';
            $data['rencanaan'] = Perencanaan::where('id', $id)->first();
            return view('Keuangan.action.showDipa', $data);
        }

}
