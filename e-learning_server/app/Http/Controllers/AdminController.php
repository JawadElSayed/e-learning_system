<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller {

    public function addUser(Request $request){

        // validating inputes
        $request->validate([
            'name' => 'required|string|max:255',
            'user_type' => 'required|string',
        ]);
        // generating password
        $password = Str::random(8);
        
        // specifying user type
        $user_type = UserType::where("user_type", $request->user_type)->first();
        if ($user_type === null){
            return response()->json([
                'status' => 'error',
                'message' => 'user type does not exist',
            ]);
        }
        $user_type = $user_type["id"];

        // getting user id
        $user_id = User::orderByDesc("user_id")->select("user_id")->first();
        if ($user_id === null){
            $user_id = 10000;
        }
        else{
            $user_id = $user_id["user_id"] + 1;    
        }
        
        $user = User::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'password' => Hash::make($password),
            'user_type' => $user_type,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'password' => $password,
        ]);
    }

    public function addUserType($user_type){

        $type = UserType::create([
                'user_type' => $user_type,
            ]);

        return response()->json([
                'status' => 'success',
                'message' => 'User type created successfully',
                'user_type' => $type,
            ]);
    }

    public function addCourse(Request $request) {

        $request->validate([
            'code' => 'required|string|max:10',
            'name' => 'required|string',
            'description' => 'required|string',
            'credits' => 'required|integer',
        ]);

        $course_exist = Course::where("code", $request->code)->first();
        if($course_exist !== null){
            return response()->json([
                'status' => 'error',
                'message' => 'course already exist',
            ]);
        }

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

    public function assign($course_code = "csc200", $user_id = "63433351cdfd39141808b1e3") {

        $user_type = UserType::where("user_type", "instructor")->select("_id")->first();
        $instructor = User::where("user_type", $user_type["_id"])->where("_id", $user_id)->get();
        
        if($instructor === null){
            return response()->json([
                'status' => 'error',
                'message' => 'wronge user',
            ]);
        }

        $course_exist = Course::where("code", $course_code)->select("_id")->first();
        if($course_exist === null){
            return response()->json([
                'status' => 'error',
                'message' => 'course does not exist',
            ]);
        }

        $course = Course::find($course_exist["_id"]);
        $course->user_id = $user_id;  
        $course->save();
        
        return response()->json([
                'status' => 'success',
                'message' => 'instructor assigned successfully',
                'course' => $course,
            ], 200);
    }
}
