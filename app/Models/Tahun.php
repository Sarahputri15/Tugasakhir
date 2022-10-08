<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $table = 'tahuns';
    protected $guarded;

    public function user() {
        return $this->hasMany(User::class);
    }
}
