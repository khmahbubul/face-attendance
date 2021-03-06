<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceReportExport;
use App\Exports\MonthlyAttendanceReportExport;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceReportController extends Controller
{
    /**
     * Constructor function
     */
    function __construct()
    {
        $this->middleware('permission:attendance-report-read|attendance-report-create|attendance-report-update|attendance-report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:attendance-report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:attendance-report-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:attendance-report-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::where('company_id', auth()->user()->company_id)->where('status', TRUE)->get(['id', 'name']);
        $users = User::where('company_id', auth()->user()->company_id)->get(['id', 'name']);
        $reports = $this->filter($request)->paginate(30);
        return view('attendance-reports.index', compact('departments', 'reports', 'users'));
    }

    /**
     * Filter function
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function filter(Request $request)
    {
        $query = Attendance::whereHas('user', function ($q) use ($request) {
            $q->where('company_id', auth()->user()->company_id);

            if ($request->department_id)
                $q->where('department_id', $request->department_id);

            if ($request->user_id)
                $q->where('id', $request->user_id);
        });

        if ($request->start && $request->end)
            $query->whereBetween('created_at', [Carbon::parse($request->start)->format('Y-m-d'), Carbon::parse($request->end)->format('Y-m-d')]);
        else if ($request->start || $request->end) {
            $attendance_date = $request->start ? $request->start : $request->end;
            $query->whereDate('created_at', Carbon::parse($attendance_date)->format('Y-m-d'));
        }

        return $query;
    }

    //hourly timeframe
    public function overallExport(Request $request)
    {
        if (!$request->user_id)
            return redirect()->back();

        $user = User::find($request->user_id);
        if (!$user || $user->company_id != auth()->user()->company_id)
            return redirect()->back();

        return Excel::download(new AttendanceReportExport($request), 'attendances.xlsx');
    }

    //monthly attendance report
    public function monthlyExport(Request $request)
    {
        if (!$request->user_id)
            return redirect()->back();

        $user = User::find($request->user_id);
        if (!$user || $user->company_id != auth()->user()->company_id)
            return redirect()->back();

        return Excel::download(new MonthlyAttendanceReportExport($request, $user), 'monthly-attendances.xlsx');
    }
}
