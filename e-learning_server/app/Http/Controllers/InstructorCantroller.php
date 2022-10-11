<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class InstructorCantroller extends Controller {

    public function addAssignment(Request $request) {

        // validating inputes
        try {
            $request->validate([
                'course_id' => 'required|string',
                'title' => 'required|string',
                'assignment' => 'required|string',
                'due_to' => 'required|date',
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'errors' => $exception->getMessage(),
            ]);
        }

        // checking if course exist
        $course_exist = Course::find($request->course_id);
        if($course_exist === null){
            return response()->json([
                'status' => 'error',
                'message' => 'course does not exist',
            ]);
        }

        // adding assignment
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

    public function addAnnouncement(Request $request) {

        // validating inputes
        try {
            $request->validate([
                'title' => 'required|string',
                'announcement' => 'required|string',
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'errors' => $exception->getMessage(),
            ]);
        }

        // adding announcement
        $user_id = Auth::user();
        $announcement = Announcement::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'announcement' => $request->announcement,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'announcement created successfully',
            'assignment' => $announcement,
        ], 200);
    }
}
