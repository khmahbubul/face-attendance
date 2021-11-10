<?php

namespace App\Http\Controllers\Api;

use App\Events\AttendanceEvent;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function performAttendance(Request $request, User $user)
    {
        if ($user->company_id != auth()->user()->company_id)
            return response()->json(['message' => 'Unauthorized'], 403);
        
        $request->validate([
            'camera' => ['required', 'in:in,out']
        ]);
        
        $attendance = $user->attendances()->whereDate('created_at', Carbon::today())->first();

        if ($request->camera == 'in') {
            if (empty($attendance))
                Attendance::create([
                    'user_id' => $user->id,
                    'entry' => Carbon::now()
                ]);
            AttendanceLog::create([
                'user_id' => $user->id,
                'type' => 'in'
            ]);
        }
        else if ($request->camera == 'out') {
            if (!empty($attendance))
                $attendance->update([
                    'exit' => Carbon::now()
                ]);
            AttendanceLog::create([
                'user_id' => $user->id,
                'type' => 'out'
            ]);
        }

        event(new AttendanceEvent($request->camera, $user));

        return ['message' => 'Attendance done'];
    }
}
