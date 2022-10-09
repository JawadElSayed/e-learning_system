<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller {

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
}
