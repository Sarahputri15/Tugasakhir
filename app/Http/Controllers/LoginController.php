<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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

        $token = str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        
        $action_link = route('password_forgot', ['token' => $token,'email' => $request->email]);

        $body = "We are received a request to reset the password for <b>SIMPBJ</b> account associated with ".$request->email.". You can reset your password by clicking the link below";

        Mail::send('Login.Email_forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('noreply@example.com','SIMPBJ');
            $message->to($request->email,'Your name')
                    ->subject('Reset Password');
      });

      return back()->with('success', 'Kami telah mengirimkan tautan setel ulang kata sandi Anda melalui email!');
    }

    public function new_password(Request $request, $token = null)
    {
        $data['title'] = 'Reset Email';
        return view('Login.reset_password.reset', $data)->with(['token' => $token,'email' => $request->email]);
    }

    public function new_password2(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation' =>'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{

            User::where('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect('/Login')->with('info', 'Kata sandi Anda telah diubah! Anda dapat masuk dengan kata sandi baru')->with('verifiedEmail', $request->email);
        }
    }
}
