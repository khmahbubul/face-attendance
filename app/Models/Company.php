<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'token',
        'face_api_secret'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getAdminAttribute()
    {
        return $this->users()->role('Admin')->first();
    }
}
