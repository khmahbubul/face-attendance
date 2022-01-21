<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    /**
     * Constructor function
     */
    function __construct()
    {
        $this->middleware('permission:attendance-report-read|attendance-report-create|attendance-report-update|attendance-report-delete', ['only' => ['index','show']]);
        $this->middleware('permission:attendance-report-create', ['only' => ['create','store']]);
        $this->middleware('permission:attendance-report-update', ['only' => ['edit','update']]);
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
        $reports = $this->filter($request)->paginate(30);
        return view('attendance-reports.index', compact('reports'));
    }

    /**
     * Filter function
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function filter(Request $request)
    {
        $query = User::query();

        return $query;
    }
}
