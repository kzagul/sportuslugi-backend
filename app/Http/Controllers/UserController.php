<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function users(): JsonResponse {
        $users = User::with('roles')->get();
         return response()->json([
             'users' => $users
         ], 200);
    }

    public function user($user_id): JsonResponse {
        $user = User::where('id', $user_id)->with('roles')->get();
         return response()->json([
             'user' => $user
         ], 200);
    }

    public function putUser(Request $request, $user_id): JsonResponse {
        $user = User::find($user_id);

        if($user){
            $user->update([
                'name' => $request->name,
                'verified_moderator' => $request->verified_moderator
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'user data updated',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }

    public function roles(): JsonResponse {
        $roles = Role::with('users')->get();
         return response()->json([
             'roles' => $roles
         ], 200);
    }

    public function services(): JsonResponse {
        $users = User::with('services')->get();
         return response()->json([
             'users' => $users
         ], 200);
    }

    public function service($user_id): JsonResponse {
        $user = User::where('id', $user_id)->with('services')->get();
         return response()->json([
             'user' => $user
         ], 200);
    }
}
