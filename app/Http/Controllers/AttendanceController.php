<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request, User $user)
    {
        $request->validate([
            'date' => ['required', 'date']
        ]);

        $attendanceLogs = AttendanceLog::where('user_id', $user->id)
            ->whereDate('created_at', $request->date)
            ->get();
        
        return view('attendances.log', compact('attendanceLogs'));
    }
}
