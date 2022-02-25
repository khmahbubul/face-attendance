<?php

namespace App\Exports;

use App\Models\Attendance;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class AttendanceReportExport implements FromView
{
    protected $attendances;

    public function __construct(Request $request)
    {
        $this->attendances = Attendance::where('user_id', $request->user_id)->get();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel-reports.attendance-overall', [
            'attendances' => $this->attendances
        ]);
    }
}
