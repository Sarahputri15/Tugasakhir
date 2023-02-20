<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pbj extends Model
{
    use HasFactory;

    protected $table = 'pbj';
    protected $guarded = ['id'];

    public function index()
    {
        $user = User::first();
        $newDate = $user->created_at->format('d-m-Y');

        dd($newDate);
    }
}


