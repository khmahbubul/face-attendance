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

        $userIds = [4];//$this->recognizeFace($request, auth()->user());
        if (!$userIds)
            return response()->json(['message' => 'Face not recognized!'], 404);
        
        $users = User::where('company_id', auth()->user()->company_id)->whereIn('id', $userIds)->get();
        foreach ($users as $user)
            $this->saveAttendance($request, $user);

        event(new AttendanceEvent($request->camera, $users, auth()->user()->company_id));

        return ['message' => 'Attendance done'];
    }

    /**
     * Saves attendance
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    private function saveAttendance(Request $request, User $user)
    {
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
        $response = Http::post('http://52.163.71.151:80/officemulti', [
            'token' => $user->company->face_api_secret,
            'file' => $request->photo
        ])->object();

        return isset($response->user_id) ? $response->user_id : FALSE;
    }
}
