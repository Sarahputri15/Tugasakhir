<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pbj extends Model
{
    use HasFactory;

    protected $table = 'pbj';
    protected $guarded = ['id'];
}
