<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'user_id',
        'start',
        'end',
        'reason',
        'document',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
