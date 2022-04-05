<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\Sync;
use App\Models\User;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    public function userSync(Request $request)
    {
        if (!isset($request->version))
            return [];

        $sync = Sync::where('company_id', auth()->user()->company_id)->where('name', 'user')->first();
        if (empty($sync))
            return [];

        $users = User::withTrashed()->with(['designation'])->where('company_id', auth()->user()->company_id)->where('sync_version', $sync->version)->get();
        $response = [];
        foreach ($users as $user) {
            $response[] = [
                'id' => $user->id,
                'name' => $user->name,
                'photo' => $user->photo,
                'photo_url' => asset($user->photo),
                'eid' => $user->eid,
                'designation' => $user->designation->name,
                'sync_version' => $user->sync_version,
                'face_embed' => $user->face_embed,
                'deleted_at' => $user->deleted_at
            ];
        }

        if (sizeof($response) > 0)
            $sync->update(['version' => ($sync->version + 1)]);

        return response($response, 200);
    }

    public function attendanceSync(Request $request)
    {
        if (!isset($request->version))
            return [];

        $sync = Sync::where('company_id', auth()->user()->company_id)->where('name', 'attendance')->first();
        if (empty($sync))
            return [];

        foreach ($request->attendances as $attendance) {
            $ta = $attendance;
            unset($ta['id']);
            Attendance::updateOrInsert(['id' => $attendance['id']], $ta);
        }

        if (count($request->attendance_logs))
            AttendanceLog::insert($request->attendance_logs);

        if (count($request->attendances) || count($request->attendance_logs))
            $sync->update(['version' => $request->version]);

        return response([], 200);
    }
}
