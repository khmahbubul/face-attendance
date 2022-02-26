<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyAttendanceReportExport implements FromView
{
    protected $attendances;
    protected $user;

    public function __construct(Request $request, User $user)
    {
        $this->attendances = Attendance::where('user_id', $request->user_id)->get();
        $this->user = $user;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel-reports.attendance-monthly', [
            'attendances' => $this->attendances,
            'officeHour' => $this->user->office_hour
        ]);
    }
}
