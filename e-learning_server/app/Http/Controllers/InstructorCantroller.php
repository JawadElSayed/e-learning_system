<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorCantroller extends Controller {

    public function addAssignment(Request $request) {

        $request->validate([
            'course_id' => 'required|string',
            'title' => 'required|string',
            'assignment' => 'required|string',
            'due_to' => 'required|date',
        ]);

        $course_exist = Course::where("code", $request->course_id)->first();
        if($course_exist !== null){
            return response()->json([
                'status' => 'error',
                'message' => 'course already exist',
            ]);
        }

        $user_id = Auth::user();
        $assignment = Assignment::create([
            'course_id' => $request->course_id,
            'user_id' => $user_id,
            'title' => $request->title,
            'assignment' => $request->assignment,
            'due_to' => $request->due_to,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'assignment created successfully',
            'assignment' => $assignment,
        ], 200);
    }
}