<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDesignation(Department $department)
    {
        if (auth()->user()->company_id != $department->company_id)
            return [];
        
        return response()->json([
            'data' => $department->designations()->get(['id', 'name'])
        ], 200);
    }
}
