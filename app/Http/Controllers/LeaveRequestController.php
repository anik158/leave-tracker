<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('leave_requests.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'leave_type' => 'required|in:Casual Leave,Sick Leave,Emergency Leave',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'reason' => 'required|string|max:255',
            ]);

            $leaveRequest = new LeaveRequest();
            $leaveRequest->leave_type = $validatedData['leave_type'];
            $leaveRequest->start_date = $validatedData['start_date'];
            $leaveRequest->end_date = $validatedData['end_date'];
            $leaveRequest->reason = $validatedData['reason'];
            $leaveRequest->user_id = auth()->id();
            $leaveRequest->save();

            session()->flash('successMessage', 'Leave request submitted successfully.');

            return response()->json([
                'redirect' => route('dashboard'),
            ]);
        } catch (\Exception $e) {
            \Log::error('Error creating leave request: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Error creating leave request.']);
        }
    }


    public function show(LeaveRequest $leaveRequest){

    }

    public function edit(LeaveRequest $leaveRequest){

    }

    public function update(Request $request, LeaveRequest $leaveRequest){

    }

    public function destroy(LeaveRequest $leaveRequest){

    }
}
