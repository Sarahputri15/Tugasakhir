<?php 
namespace App\Helpers;
use App\Models\User;

class Bantuan {
    public static function get_tahun($id)
    {
        $user = User::leftJoin('tahuns', 'users.login_as','=','tahuns.id')->where('users.id', $id)->select('years')->first();
        
        return $user->years;
    }
}