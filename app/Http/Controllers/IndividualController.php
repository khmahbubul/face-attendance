<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualController extends Controller
{
    public function attendanceShow()
    {
        $user = auth()->user();
        $attendances = $user->attendances()->latest()->paginate(10);
        return view('individual.attendance.show', compact('user', 'attendances'));
    }
}
