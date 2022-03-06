<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'monitor_id', //monitor id
        'name',
        'token',
        'face_api_secret',
        'logo'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function monitor()
    {
        return $this->belongsTo(User::class);
    }

    public function getAdminAttribute()
    {
        return $this->users()->role('Admin')->first();
    }
}
