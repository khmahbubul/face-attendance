<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'type',
        'sync_version'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
