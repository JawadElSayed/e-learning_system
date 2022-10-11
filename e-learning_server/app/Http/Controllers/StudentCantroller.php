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
    }
    
}
