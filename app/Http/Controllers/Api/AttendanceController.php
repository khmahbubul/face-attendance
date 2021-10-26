<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function performAttendance(User $user)
    {
        if ($user->company_id != auth()->user()->company_id)
            return response()->json(['message' => 'Unauthorized'], 403);
    }
}
