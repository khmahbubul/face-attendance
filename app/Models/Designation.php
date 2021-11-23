<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'company_id',
        'department_id',
        'name'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
