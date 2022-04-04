<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'entry',
        'exit',
        'sync_version'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
