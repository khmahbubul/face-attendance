<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDesignation(Department $department, Designation $designation)
    {
        if (auth()->user()->company_id != $department->company_id)
            return [];

        $designations = $department->designations()->get(['id', 'name']);
        $html = '<option value="">--select--</option>';
        foreach ($designations as $des) {
            if ($des->id == $designation->id)
                $html .= '<option value="' . $des->id . '" selected>' . $des->name . '</option>';
            else
                $html .= '<option value="' . $des->id . '">' . $des->name . '</option>';
        };

        return response()->json([
            'data' => $html
        ], 200);
    }
}
