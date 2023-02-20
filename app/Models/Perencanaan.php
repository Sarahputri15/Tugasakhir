<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    use HasFactory;
    protected $table = 'perencanaans';
    protected $guarded = ['id'];

    public function dokumen() {
        return $this->belongsTo(Dokumen::class);
    }

    public function tahun() {
        return $this->belongsTo(Tahun::class);
    }

    public function getCreatedAttribute()
    {
       return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
       return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i');
    }
}
