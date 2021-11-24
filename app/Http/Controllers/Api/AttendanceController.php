<?php

namespace App\Http\Controllers\Api;

use App\Events\AttendanceEvent;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{
    public function performAttendance(Request $request)
    {
        $request->validate([
            'camera' => ['required', 'in:in,out'],
            'photo' => ['required', 'string']
        ]);

        $userId = $this->recognizeFace($request, auth()->user());
        if (!$userId)
            return response()->json(['message' => 'Face not recognized!'], 404);
        
        $user = User::find($userId);
        if (!$user)
            return response()->json(['message' => 'Unauthorized'], 401);

        if ($user->company_id != auth()->user()->company_id)
            return response()->json(['message' => 'Forbidden'], 403);
        
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

    /**
     * Registers new face
     *
     * @param Request
     * @param User $user
     * @return bool|mixed
     */
    private function recognizeFace(Request $request, User $user)
    {
        $response = Http::post('http://52.163.71.151:80/officepredict', [
            'token' => $user->company->face_api_secret,
            'file' => $request->photo
        ])->object();

        return isset($response->user_id) ? $response->user_id : FALSE;
    }
}
