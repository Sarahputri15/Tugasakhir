<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaans';
    protected $guarded = ['id'];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }
}
