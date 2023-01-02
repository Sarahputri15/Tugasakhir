<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tahun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Carbon\Carbon;

//Controller Master Admin
class LoginController extends Controller
{
    //Halaman Data User
    public function index2() 
    {
        $data['user'] = User::join('admins','users.Admin_id', '=', 'admins.id')
                        ->select('users.id', 'users.name', 'users.nip', 'users.email', 'admins.admin', 'users.password')
                        ->get();
        $data['title'] = 'Data User';
        $data['sum'] = User::all()->count();
        return view('KeyAdmin.User.user', $data);
    }

    //Hapus Data
    public function delete($id)
    {
        User::where('id',$id)->delete();

        return redirect('User');
    }

    //Halaman Login
    public function index() 
    {
        $data['years'] = Tahun::all();
        $data['title'] = 'Login';
        return view('Login.index',$data);
    }

    //ketika sedang login
    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials))
        {

            $request->session()->regenerate();
            $admin = User::where('email',$request->email)->first();
            User::where('email', $request->email)->update([
                'login_as' => $request->tahun
            ]);
            if($admin->Admin_id==1){
                return redirect()->intended('/Dashboard');
            }
            else if($admin->Admin_id==2){
                return redirect()->intended('/Dashboard_Pengadaan');

            }else if($admin->Admin_id==3){
                return redirect()->intended('/Dashboard_Keuangan');
                
            }else if($admin->Admin_id==4){
                return redirect()->intended('Dashboard_pejabatPengadaan');
                
            }else{
                return redirect()->intended('User');
            } 
        }
        return back()->with('error', 'Login Gagal');
    }

    //jika ingin memunculkan halaman register di halaman login...
    public function register2()
    {
        $data['title'] = 'Registrasi Akun';
        $data['admins'] = Admin::all();
        return view('Login.registrasi.registrasi', $data);
    }

    //Halaman tambah data
    public function register()
    {
        $data['title'] = 'Tambah Data';
        $data['admins'] = Admin::all();
        return view('KeyAdmin.Action.create', $data);
    }

    //Tambah data
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'nip' => 'required|min:5',
            'email' => 'required|email:dns|unique:users',
            'Admin_id' => 'required',
            'password' => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        return redirect('User');
    }

    //Halaman edit data
    public function edit($id)
    {
        $data['title'] = "Edit data";
        $data['user'] = User::where('id', $id)->first();
        $data['admins'] = Admin::all();
        return view('KeyAdmin.Action.edit', $data);
    }
    
    //Edit Data
    public function edit2(Request $request)
    {
        $edit = User::find($request->id);
            $edit->name = $request->name;
            $edit->nip = $request->nip;
            $edit->email = $request->email;
            $edit->Admin_id = $request->Admin_id;
            $edit->password = Hash::make($request->password);

            $edit->save();
        return redirect('User');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/Login');
    }

    //Verifikasi email
    public function verifikasi()
    {
        $data['title'] = 'Verifikasi Email';
        return view('Login.reset_password.Verifikasi', $data);
    }

    public function verifikasi2(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}
