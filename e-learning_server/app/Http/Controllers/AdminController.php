<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller {

    public function addUser(Request $request){

        // validating inputes
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'user_type' => 'required|string',
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'errors' => $exception->getMessage(),
            ]);
        }
        // generating password
        $password = Str::random(8);

        // getting user id
        $user_id = User::orderByDesc("user_id")->select("user_id")->first();
        if ($user_id === null){
            $user_id = 10000;
        }
        else{
            $user_id = $user_id["user_id"] + 1;    
        }
        
        // creating user
        $user = User::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'password' => Hash::make($password),
            'user_type' => $request->user_type,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'password' => $password,
        ]);
    }

    public function addCourse(Request $request) {

        // validating inputes
        try {
            $request->validate([
                'code' => 'required|string|max:10',
                'name' => 'required|string',
                'description' => 'required|string',
                'credits' => 'required|integer',
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'errors' => $exception->getMessage(),
            ]);
        }

        // check if course exists
        $course_exist = Course::where("code", $request->code)->first();
        if($course_exist !== null){
            return response()->json([
                'status' => 'error',
                'message' => 'course already exist',
            ]);
        }

        // creating course
        $course = Course::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'credits' => $request->credits,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Course created successfully',
            'course' => $course,
        ], 200);
    }

    public function assign(Request $request) {

        try {
            $request->validate([
                'course_code' => 'required|string|max:10',
                'user_id' => 'required|string',
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'errors' => $exception->getMessage(),
            ]);
        }

        // checking if instructor
        $instructor = User::where("user_type", "instructor")->where("_id", $request->user_id)->get();
        if($instructor === null){
            return response()->json([
                'status' => 'error',
                'message' => 'wronge user',
            ]);
        }

        // checking if course exists
        $course_exist = Course::where("code", $request->course_code)->select("_id")->first();
        if($course_exist === null){
            return response()->json([
                'status' => 'error',
                'message' => 'course does not exist',
            ]);
        }

        // assigning course
        $course = Course::find($course_exist["_id"]);
        $course->user_id = $request->user_id;  
        $course->save();
        
        return response()->json([
                'status' => 'success',
                'message' => 'instructor assigned successfully',
                'course' => $course,
            ], 200);
    }

     public function Students() {

        // checking if course exists
        $students = User::where("User_type", "student")->get();
        
        return response()->json([
                'status' => 'success',
                'students' => $students,
            ], 200);
    }

}
