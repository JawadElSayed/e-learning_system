<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Enrolle;
use App\Models\Submit;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentCantroller extends Controller {

    public function submit(Request $request) {

        // validating inputes
        try {
            $request->validate([
            'assignment_id' => 'required|string',
            'file' => 'required|file',
        ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'errors' => $exception->getMessage(),
            ]);
        }
        
        // check deadline
        $deadline = Assignment::find($request->assignment_id);
        $now = new DateTime();
        $now = new Carbon($now) ;

        if($deadline["due_to"] < $now){
            return response()->json([
                'status' => 'error',
                'message' => 'your are late',
            ]);
        }

        // submiting
        $user_id = Auth::user();
        Submit::create([
            'assignment_id' => $request->assignment_id,
            'user_id' => $user_id,
            'file' => $request->file,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'submited successfully',
        ], 200);
    }

    public function enroll(Request $request) {
        
        // validating inpute
        try {
            $request->validate([
            'course_id' => 'required|string',
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

        // enrolling
        $user_id = Auth::user();
        Enrolle::create([
            'user_id' => $user_id,
            'course_id' => $request->course_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'enrolled successfully',
        ], 200);

        
    }
}
