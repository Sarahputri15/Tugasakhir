<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class MasterController extends Controller
{
    //Halaman Data User
    public function index2() 
    {
        $data['user'] = User::join('admins','users.AdminId', '=', 'admins.id')
                        ->select('users.id', 'users.name', 'users.nip', 'users.email', 'admins.admin', 'users.password')
                        ->get();
        $data['title'] = 'Data User';
        $data['sum'] = User::all()->count();
        return view('KeyAdmin.User.user', $data);
    }

    //Halaman tambah data
    public function register()
    {
        $data['title'] = 'Tambah Data';
        $data['admins'] = Admin::all();
        return view('KeyAdmin.Action.create', $data);
    }

    //Hapus Data
    public function delete($id)
    {
        User::where('id',$id)->delete();

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
        $edit->AdminId = $request->AdminId;
        $edit->password = Hash::make($request->password);
    
        $edit->save();
        return redirect('User');
    }

        public function store(Request $request)
        {
            $validate = $request->validate([
                'name' => 'required|min:5',
                'nip' => 'required|min:5',
                'email' => 'required|email:dns|unique:users',
                'AdminId' => 'required',
                'password' => 'required',
            ]);
    
            $validate['password'] = Hash::make($validate['password']);
    
            User::create($validate);
            
            return redirect('User');
        }
}
