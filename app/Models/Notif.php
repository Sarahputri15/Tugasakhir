<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;

    protected $table = 'notifs';
    protected $guarded;

    public function getCreatedAtAttribute()
    {
       return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
    }
}
