<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Constructor function
     */
    function __construct()
    {
        $this->middleware('permission:leave-read|leave-create|leave-update|leave-delete', ['only' => ['index','show']]);
        $this->middleware('permission:leave-create', ['only' => ['create','store']]);
        $this->middleware('permission:leave-update', ['only' => ['edit','update']]);
        $this->middleware('permission:leave-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::with('user')->paginate(10);
        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('company_id', auth()->user()->company_id)->get(['id', 'name']);
        return view('leaves.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $data = $request->only(['user_id', 'reason', 'status']);
        $data['start'] = Carbon::parse($request->start);
        $data['end'] = Carbon::parse($request->end);

        if ($request->document)
            $data['document'] = 'storage/' . $request->document->store('leave-documents');

        Leave::create($data);

        return redirect()->route('leaves.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leaf
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leaf)
    {
        $leave = $leaf;
        $user = $leave->user;
        return view('leaves.show', compact('leave', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leaf
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leaf)
    {
        $leave = $leaf;
        $user = $leave->user;
        return view('leaves.edit', compact('leave', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leaf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leaf)
    {
        $request->validate([
            'status' => ['required', 'in:Approved,Rejected']
        ]);

        if ($leaf->status != 'Pending')
            return redirect()->back();

        $leaf->update(['status' => $request->status]);
        return redirect()->route('leaves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }

    /**
     * validation function
     *
     * @param Request $request
     * @return void
     */
    private function validation(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'reason' => ['required', 'string', 'max:1000'],
            'document' => ['nullable', 'file', 'mimes:jpeg,jpg,png,pdf', 'max:2048'],
            'status' => ['nullable', 'in:Pending,Approved,Rejected']
        ]);
    }
}
